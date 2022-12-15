<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Alejandro Pillado',
            'email' => 'alejandro.pillado@outlook.com',
            'password' => bcrypt('123456789')
        ]);

        $rol = Role::create(['name' => 'Administrador']);

        $permisos = Permission::pluck('id','id')->all();

        $rol->syncPermissions($permisos);
        
        $user->assignRole([$rol->id]);
    }
}
