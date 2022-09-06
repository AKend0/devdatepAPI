<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Asigno los  tipos de roles que van a existir en el sistema
        $roleAdmin      = Role::create(['name' => 'admin']);
        $roleDev        = Role::create(['name' => 'dev']);
        $roleMkt        = Role::create(['name' => 'mrk']);
        $roleTrainee    = Role::create(['name' => 'trainee']);

        //  1 - Determino los permisos que existirán
        //      El cambo 'name'será la ruta del permiso
        //  2 -Asigno a que roles se les daran estos permisos
        Permission::create(['name' => 'admin'])         ->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'developer'])     ->syncRoles([$roleDev]);
        Permission::create(['name' => 'marketing'])     ->syncRoles([$roleMkt]);
        Permission::create(['name' => 'traine'])        ->syncRoles([$roleTrainee]);
    }
}
