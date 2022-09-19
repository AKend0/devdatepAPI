<?php

namespace App\Console\Commands;

use App\Models\Absense;
use Illuminate\Console\Command;
use App\Models\Applier;
use App\Models\Assist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AssistCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Assist:Command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      //$prueba     = Carbon::create(0,0,0,13,0,0)->toTimeString();
      $carbon     = Carbon::now();
      $hora   = $carbon->toTimeString();
      echo $hora , " ";
      if ($hora == '13:00:00' || $hora == '18:00:00' || $hora == '23:00:00') {
         $turnid = DB::table('turns')->where('salida', $hora)->first();

     //         echo $turnoid , "  ";
             /* foreach ($turnos as $turn){
                $user=$turn->id;
                print_r($turn->turno);//muestra turno 
                echo " ";
             } */
     //     $appliersid = Applier::Where('turn_id', $turnoid)->pluck('id');
          
    //    echo $appliersid;
        //foreach ($appliers as $applier) {
        //    $iduser= $applier->id;
         //   echo $applier->nombre,' || ';    //muestra usuarios del turno 
        // }
        // $assists = DB::table('assists')->where('user_id', $appliersid )->get();
         //  echo $assists;
    //   }else{
    //    echo "no hay turno";
    //  } 
      
          

      

       /*  $finalMs = DB::table('turns')->where('salida','13:00:00');
        $final= $finalMs->toTimeString();
        $finalTs = DB::table('turns')->where('salida','18:00:00')->value('salida');
        $finalNs = DB::table('turns')->where('salida','23:00:00')->value('salida');
           echo $final; */
           
        /* 
   foreach ($finals as $final) {
            if ($prueba===$final){
            $user = $final->id;
            echo "Turno: ",$final->turno,' '; }}
     $appliers = DB::table('appliers')->where('turn_id', $user )->get();
        foreach ($appliers as $applier) {
            echo $applier->nombre,' ';    
        }
            
            }else{
                echo "tuno no existe";
            }
        }
        echo 'Hora actual:',$hora,' '; */
        
        //$turnid = 1;
        $aplicantes = Applier::Where('turn_id',$turnid->id)->pluck('id');

       // $asistentes = Assist::whereTime('hora_ingreso','>','13:00:00')->whereTime('hora_ingreso','<','18:00:00')->pluck('user_id');
       $asistentes = Assist::whereTime('hora_ingreso','>',$turnid->entrada)->whereTime('hora_ingreso','<',$turnid->salida)->pluck('applier_id');

        $faltantes = Applier::Where('turn_id',$turnid->id)->whereNotIn('id',$asistentes)->pluck('id');
        
        echo $turnid->id;
        echo '<br>';
        echo $aplicantes;
        echo '<br>';
        echo $asistentes;
        echo '<br>';    
        echo $faltantes;
     

foreach ($faltantes as $faltante){
        
        $falta = new Absense();
        $falta->applier_id = $faltante;
        $falta->user_id =  User::where('applier_id',$faltante)->value('id');
        $falta->fecha = Carbon::now()->toDateString();
        $falta->save();
         

        
    /*      Absense::create(
        [
        'user_id' =>$faltante,
        'turn_id' => $turnid->id,
        'fecha' => $hora,
        ]
        ); */
        
     }
        
    }else{
        echo '<br>'; 
        echo "no hay nada por el momento";
    }
    }

}
