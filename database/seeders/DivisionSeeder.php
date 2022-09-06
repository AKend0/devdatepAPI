<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create(['nombre'=> 'Recursos Humanos']);
        Division::create(['nombre'=> 'Desarrollo']);
        Division::create(['nombre'=> 'Administracion']);
        Division::create(['nombre'=> 'Marketing']);
    }
}
