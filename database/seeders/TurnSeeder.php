<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Turn;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TurnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turn::create([
            'turno'     =>  'mañana',
            'entrada'   =>  Carbon::create(0,0,0,8,0,0)->toTimeString(),
            'salida'    =>  Carbon::create(0,0,0,13,0,0)->toTimeString(),
        ]);
        Turn::create([
            'turno'     =>  'tarde',
            'entrada'   =>  Carbon::create(0,0,0,13,0,0)->toTimeString(),
            'salida'    =>  Carbon::create(0,0,0,18,0,0)->toTimeString(),
        ]);
        Turn::create([
            'turno'     =>  'noche',
            'entrada'   =>  Carbon::create(0,0,0,18,0,0)->toTimeString(),
            'salida'    =>  Carbon::create(0,0,0,23,0,0)->toTimeString(),
        ]);
    }
}
