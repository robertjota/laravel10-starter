<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => 'password'
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => 'password'
        ]);
        $usuario = User::create([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => 'password'
        ]);

        $superAdmin->assignRole('Super Admin');
        $admin->assignRole('Admin');
        $usuario->assignRole('Usuario');
    }
}
