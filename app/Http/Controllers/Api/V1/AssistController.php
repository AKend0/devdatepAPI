<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Assist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AssistCollection;
use App\Models\Applier;
use App\Models\Turn;
use Illuminate\Support\Facades\DB;

class AssistController extends Controller
{
    protected $minutos_antes = 15;
    protected $minutos_tolerancia=10;
    protected $tz = 'UTC';
    protected $puntual = 118;
    protected $tarde = 114;
    protected $falta = 103;
    protected $outTurn =109;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    return new AssistCollection(Assist::orderBy('id','asc')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registro(Request $request)
    {
        $carbon     = Carbon::now(); //fecha y hora
        $hIngreso   = $carbon->toTimeString(); //hora  HH:mm:ss
        $user       = User::find($request->id);
        $prueba     = Carbon::create(0,0,0,8,11,0)->toTimeString();
        $turno      = Turn::find($user->applier->turn_id);
        

        //es necesario instanciar los horarios con carbon para utilizar sus metodos
        $turnoIn    = Carbon::createFromTimeString($turno->entrada,$this->tz);
        $turnoOut   = Carbon::createFromTimeString($turno->salida,$this->tz);

        //No alterar este orden
        $hEntrada       = $turnoIn->subMinutes($this->minutos_antes)->toTimeString();
        $hTolerancia    = $turnoIn->addMinutes($this->minutos_antes + $this->minutos_tolerancia)->toTimeString();


        $assist = new Assist();
        $assist->user_id = $request->id;
        $assist->applier_id = $user->applier_id;
        $assist->hora_ingreso = $hIngreso; 
        $assist->fecha = $carbon->toDateString();
        $assist->dni = $user->applier->dni;
        $assist->nombres_com	 = $user->applier->nombre;
        $assist->plataforma = $user->applier->platform_id;
        //$assist->estado_asist = $assist->status;  tecnicamente status dice el estado q esta xd 
        $assist->turno = $user->applier->turn_id;

            //Si el usuario ingresa entre la apertura de horario y la
            //toleancia de 10 mins pasado su horario de ingreso
            if($hEntrada <= $prueba and $prueba <= $hTolerancia)
            {
                $assist->status  = $this->puntual;
                $assist->save();

                return response()->json([
                    'carbon'    =>  $carbon,
                    'hIngreso'  =>  $hIngreso,
                    'hEntrada'  =>  $hEntrada,
                    'hTolerancia'  =>  $hTolerancia,
                    'TurnoIn'   =>  $turnoIn,
                    'turnoOut'  =>  $turnoOut,
                    'dni'       =>  $user->applier->dni,
                    'name'      =>  $user->applier->nombre,
                    'apellido'  =>  $user->applier->apellidoP,
                    'codigo'    =>  $assist->status,
                    'status'    =>  'Puntual',
                    'hIngreso'  =>  $assist->hora_ingreso,
                    'fecha'     =>  $assist->fecha,
                ],200);
            }

            //Si el usuario ingresa dedués de los 10 mins de tolerancia
            if(($hTolerancia < $prueba and $prueba <= $turno->salida))
            {
                $assist->status = $this->tarde;
                $assist->save();

                return response()->json([
                    'dni'       =>  $user->applier->dni,
                    'name'      =>  $user->applier->nombre,
                    'apellido'  =>  $user->applier->apellidoP,
                    'codigo'    =>  $assist->status,
                    'status'    =>  'Tarde',
                    'hIngreso'  =>  $assist->hora_ingreso,
                    'fecha'     =>  $assist->fecha,
                ],200);
            }

        $assist->status = $this->outTurn;
        $assist->save();

        return response()->json([
            'dni'       =>  $user->applier->dni,
            'name'      =>  $user->applier->nombre,
            'apellido'  =>  $user->applier->apellidoP,
            'codigo'    =>  $assist->status,
            'status'    =>  'Usted está fuera de Turno!',
            'hIngreso'  =>  $assist->hora_ingreso,
            'fecha'     =>  $assist->fecha,
        ],203);

    }

    //var_dump($first->isAfter($second));                // bool(false)
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
