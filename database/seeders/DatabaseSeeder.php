<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run(): void
{
    // Crear roles
    $roles = ['super_admin', 'admin', 'usuario'];
    foreach ($roles as $r) {
        Role::create(['role' => $r]);
    }

    // Crear permisos
    $permisos = [
        'ver_usuarios', 'ver_roles', 'ver_permisos',
        'crear_usuario', 'crear_role', 'crear_permiso',
        'editar_usuario', 'editar_role', 'editar_permiso',
        'eliminar_usuario', 'eliminar_role', 'eliminar_permiso'
    ];

    foreach ($permisos as $p) {
        Permission::create(['permiso' => $p, 'role_id' => 1]); // Asignado a super_admin
    }

    // Crear usuario SA
    User::create([
        'name' => 'sa',
        'email' => 'sa@example.com',
        'password' => Hash::make('12345678'),
        'role_id' => 1 // super_admin
    ]);

    User::create([
    'name' => 'michel.ramoz',
    'email' => 'michel.ramoz@prueba.com',
    'password' => Hash::make('12345678'),
    'role_id' => 3 // usuario
]);

}
}
