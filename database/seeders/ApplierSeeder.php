<?php

namespace Database\Seeders;

use App\Models\Applier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applier::create([
            'nombre'      => 'JESUSAMADO SALVADOR',
            'apellidoP' =>'LLICA',
            'apellidoM' =>'GARCIA',
            'email'     => 'jllicagarcia9506@gmail.com',
            'phone'     =>'991331179',
            'dni'       =>'72157060',
            'turn_id'   =>  '1',
        ]);

        Applier::create([
            'nombre'      => 'JAIR ORIEL',
            'apellidoP' =>'VIDAURRE',
            'apellidoM' =>'SANTISTEBAN',
            'email'     => 'jvidaurresan@unprg.edu.pe',
            'phone'     =>'975183183',
            'dni'       =>'76267899',
            'turn_id'   =>  '1',
        ]);

        Applier::create([
            'nombre'      => 'RENZO RAFAEL',
            'apellidoP' =>'CARDENAS',
            'apellidoM' =>'NAMUCHE',
            'email'     => 'recarde@gmail.com',
            'phone'     =>'924663815',
            'dni'       =>'71504633',
            'turn_id'   =>  '1',
        ]);

        Applier::create([
            'nombre'      => 'OFNIOMAR',
            'apellidoP' =>'FERNANDEZ',
            'apellidoM' =>'BARTUREN',
            'email'     => 'oferba@gmail.com',
            'phone'     =>'954126789',
            'dni'       =>'71507533',
            'turn_id'   =>  '2',
        ]);

        Applier::create([
            'nombre'      => 'AGRIPINA',
            'apellidoP' =>'PAREDES',
            'apellidoM' =>'DE TORRES',
            'email'     => 'ag_trr@gmail.com',
            'phone'     =>'961548795',
            'dni'       =>'04635468',
            'turn_id'   =>  '3',
        ]);
        Applier::factory(100)->create();
    }
}
