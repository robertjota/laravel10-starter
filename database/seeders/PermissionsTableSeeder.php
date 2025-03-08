<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Desactivar las restricciones de clave foránea
        Schema::disableForeignKeyConstraints();

        // Limpiar todas las tablas relacionadas
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();

        // Reactivar las restricciones de clave foránea
        Schema::enableForeignKeyConstraints();


        //Permissions
        $permission = Permission::create(['name' => 'admin.home', 'description' => 'Dashboard', 'guard_name' => 'web']);

        $permission = Permission::create(['name' => 'admin.users.index', 'description' => 'Listar Usuarios', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.users.create', 'description' => 'Crear Usuario', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar Usuario', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.users.destroy', 'description' => 'Eliminar Usuario', 'guard_name' => 'web']);

        $permission = Permission::create(['name' => 'admin.roles.index', 'description' => 'Listar Roles', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Rol', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar Rol', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar Rol', 'guard_name' => 'web']);

        $permission = Permission::create(['name' => 'admin.permissions.index', 'description' => 'Listar Permisos', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.permissions.create', 'description' => 'Crear Permiso', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.permissions.edit', 'description' => 'Editar Permiso', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'admin.permissions.destroy', 'description' => 'Eliminar Permiso', 'guard_name' => 'web']);

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
