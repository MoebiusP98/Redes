<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [

        //table bares
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

        //table bares
            'ver-bar',
            'crear-bar',
            'editar-bar',
            'borrar-bar',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name' =>$permiso]);
        }
    }
}
