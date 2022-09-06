<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('areas')->truncate();
    }


    public function run()
    {

        //Recursos Humanos
        Area::create(['division_id'=>1,'nombre'=> 'Reclutamiento']);
        Area::create(['division_id'=>1,'nombre'=> 'Relaciones Laborales']);
        Area::create(['division_id'=>1,'nombre'=> 'Administracion de Personal']);
        Area::create(['division_id'=>1,'nombre'=> 'Formación del Personal']);

        //Desarrollo
        Area::create(['division_id'=>2,'nombre'=> 'FrontEnd']);
        Area::create(['division_id'=>2,'nombre'=> 'BackEnd']);
        Area::create(['division_id'=>2,'nombre'=> 'Base de Datos']);
        Area::create(['division_id'=>2,'nombre'=> 'Android Dev']);
        Area::create(['division_id'=>2,'nombre'=> 'Apple Dev']);
        Area::create(['division_id'=>2,'nombre'=> 'CyberSeguridad']);

        //Administracion
        Area::create(['division_id'=>3,'nombre'=> 'Gerencia']);
        Area::create(['division_id'=>3,'nombre'=> 'Negocios']);
        Area::create(['division_id'=>3,'nombre'=> 'Finanzas']);
        Area::create(['division_id'=>3,'nombre'=> 'Contabilidad']);

        //Marketing
        Area::create(['division_id'=>4,'nombre'=> 'Analisis de mercado']);
        Area::create(['division_id'=>4,'nombre'=> 'Publicidad']);
        Area::create(['division_id'=>4,'nombre'=> 'Ventas']);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
    }
}
