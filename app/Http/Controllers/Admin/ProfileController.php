<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('admin.profiles.index');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            //'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'confirm_password' => 'nullable|min:8|max:12|required_with:new_password|same:new_password',
            'file' => 'nullable|image',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        /* para la imagen del profile */
        if ($request->file('file')) {
            //verificamos si el usuario tiene una imagen previa

            $oldFile = substr($user->profile_photo_path, 8);
            $this->removeImage($oldFile);

            //se genera un nombre random de la imagen y se crea la ruta absoluta
            $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();
            $ruta = public_path() . "\storage\img\profile\\" . $nombre;
            // dd($ruta);

            //se guarda la imagen en la ruta especificada redimensionando el tamaño con el paquete InterventionImage
            Image::make($request->file('file'))
                ->resize(300, null, function ($constrain) {
                    $constrain->aspectRatio();
                })->save($ruta);

            //se genera la url de la imagen para almacenar en la base de datos
            $url = "/storage/img/profile/" . $nombre;
        }

        //se actualizan los datos en la base datos
        //$user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->file('file')) {
            $user->profile_photo_path = $url;
        }

        if (!is_null($request->input('new_password'))) {
            if ($request->input('new_password') == $request->input('confirm_password')) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('admin.profiles.index')->with('info', 'Perfil actualizado correctamente');
    }

    private function removeImage($oldFile)
    {
        if (!$oldFile) {
            return;
        }

        if (File::exists("storage" . $oldFile)) {
            File::delete("storage" . $oldFile);
        }
    }
}
