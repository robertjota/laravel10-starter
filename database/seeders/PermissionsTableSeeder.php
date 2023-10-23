<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Permissions
        $permission = Permission::create(['name' => 'admin.home', 'description' => 'Dashboard']);

        $permission = Permission::create(['name' => 'admin.users.index', 'description' => 'Listar Usuarios']);
        $permission = Permission::create(['name' => 'admin.users.create', 'description' => 'Crear Usuario']);
        $permission = Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar Usuario']);
        $permission = Permission::create(['name' => 'admin.users.destroy', 'description' => 'Eliminar Usuario']);

        $permission = Permission::create(['name' => 'admin.roles.index', 'description' => 'Listar Roles']);
        $permission = Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Rol']);
        $permission = Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar Rol']);
        $permission = Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar Rol']);

        $permission = Permission::create(['name' => 'admin.permissions.index', 'description' => 'Listar Permisos']);
        $permission = Permission::create(['name' => 'admin.permissions.create', 'description' => 'Crear Permiso']);
        $permission = Permission::create(['name' => 'admin.permissions.edit', 'description' => 'Editar Permiso']);
        $permission = Permission::create(['name' => 'admin.permissions.destroy', 'description' => 'Eliminar Permiso']);

        //Roles
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $usuario = Role::create(['name' => 'Usuario']);

        $superAdmin->givePermissionTo([
            'admin.home',
            'admin.users.index',
            'admin.users.create',
            'admin.users.edit',
            'admin.users.destroy',
            'admin.roles.index',
            'admin.roles.create',
            'admin.roles.edit',
            'admin.roles.destroy',
            'admin.permissions.index',
            'admin.permissions.create',
            'admin.permissions.edit',
            'admin.permissions.destroy'
        ]);
        $admin->givePermissionTo([
            'admin.home',
            'admin.users.index',
            'admin.users.create',
            'admin.users.edit',
            'admin.roles.index',
            'admin.permissions.index'
        ]);
        $usuario->givePermissionTo([
            'admin.home'
        ]);
    }
}
