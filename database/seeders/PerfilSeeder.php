<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //Recursos Humanos
        // Reclutamiento
        Perfil::create(['area_id'=>1,'nombre'=> '01Perfilx']);
        Perfil::create(['area_id'=>1,'nombre'=> '01Perfily']);
        // Relaciones Laborales
        Perfil::create(['area_id'=>2,'nombre'=> '02Perfilx']);
        Perfil::create(['area_id'=>2,'nombre'=> '02Perfily']);
        // Administracion de Personal
        Perfil::create(['area_id'=>3,'nombre'=> '03Perfilx']);
        Perfil::create(['area_id'=>3,'nombre'=> '03Perfily']);
        // Formación del Personal
        Perfil::create(['area_id'=>4,'nombre'=> '04Perfilx']);
        Perfil::create(['area_id'=>4,'nombre'=> '04Perfily']);

     //Desarrollo
        // FrontEnd
        Perfil::create(['area_id'=>5,'nombre'=> '05Perfilx']);
        Perfil::create(['area_id'=>5,'nombre'=> '05Perfily']);
        // BackEnd
        Perfil::create(['area_id'=>6,'nombre'=> '06Perfilx']);
        Perfil::create(['area_id'=>6,'nombre'=> '06Perfily']);
        // Base de Datos
        Perfil::create(['area_id'=>7,'nombre'=> '07Perfilx']);
        Perfil::create(['area_id'=>7,'nombre'=> '07Perfily']);
        // Android Dev
        Perfil::create(['area_id'=>8,'nombre'=> '08Perfilx']);
        Perfil::create(['area_id'=>8,'nombre'=> '08Perfily']);
        // Apple Dev
        Perfil::create(['area_id'=>9,'nombre'=> '09Perfilx']);
        Perfil::create(['area_id'=>9,'nombre'=> '09Perfily']);
        // CyberSeguridad
        Perfil::create(['area_id'=>10,'nombre'=> '10Perfilx']);
        Perfil::create(['area_id'=>10,'nombre'=> '10Perfily']);

     //Administracion
        // Gerencia
        Perfil::create(['area_id'=>11,'nombre'=> '11Perfilx']);
        Perfil::create(['area_id'=>11,'nombre'=> '11Perfily']);
        // Negocios
        Perfil::create(['area_id'=>12,'nombre'=> '12Perfilx']);
        Perfil::create(['area_id'=>12,'nombre'=> '12Perfily']);
        // Finanzas
        Perfil::create(['area_id'=>13,'nombre'=> '13Perfilx']);
        Perfil::create(['area_id'=>13,'nombre'=> '13Perfily']);
        // Contabilidad
        Perfil::create(['area_id'=>14,'nombre'=> '14Perfilx']);
        Perfil::create(['area_id'=>14,'nombre'=> '14Perfily']);

     //Marketing
        // Analisis de mercado
        Perfil::create(['area_id'=>15,'nombre'=> '15Perfilx']);
        Perfil::create(['area_id'=>15,'nombre'=> '15Perfily']);
        // Publicidad
        Perfil::create(['area_id'=>16,'nombre'=> '16Perfilx']);
        Perfil::create(['area_id'=>16,'nombre'=> '16Perfily']);
        // Ventas
        Perfil::create(['area_id'=>17,'nombre'=> '17Perfilx']);
        Perfil::create(['area_id'=>17,'nombre'=> '17Perfily']);
    }
}
