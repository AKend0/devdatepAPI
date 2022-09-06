<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::create(['nombre'=>'Computrabajo']);
        Platform::create(['nombre'=>'DevJobs']);
        Platform::create(['nombre'=>'Linkedin']);
        Platform::create(['nombre'=>'Bumeran']);
        Platform::create(['nombre'=>'Opcion de Empleo']);
        Platform::create(['nombre'=>'Indeed']);
    }
}
