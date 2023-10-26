<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'file',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function adminlte_image()
    {
        if (!empty(auth()->user()->profile_photo_path)) {
            $file = auth()->user()->profile_photo_path;
            return ($file);
        }
        return env('APP_URL') . '/img/default-avatar.png';
    }
    public function adminlte_desc()
    {
        $user = auth()->user();
        if ($user->hasRole('Super Admin')) {
            return 'Super Administrador';
        } elseif ($user->hasRole('Admin')) {
            return 'Administrador';
        } else {
            return 'Usuario';
        }
    }
    public function adminlte_profile_url()
    {
        return 'admin/profile';
    }
}
