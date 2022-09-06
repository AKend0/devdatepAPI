<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        try
        {
            //Validacion de datos ingresados DNI y Password

            $validateUser= Validator::make($request->all(),[
                'dni' => 'required',
                'password'=>'required'
            ]);

            if($validateUser->fails())
            {
                //Respuesta si la validacion de datos falla

                return response()->json([
                   'status' => false,
                   'message' => 'Hubo un problema en la validación. Porfavor, inténtelo nuevamente.',
                   'errors' => $validateUser->errors()
                ],401);
            }

            //Intento de autenticación de datos ingresados con la base de datos

            $idUser     =   DB::table('appliers')->where('dni',$request->dni)->value('id');

            if(empty($idUser))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'DNI no encontrado',
                ],401);
            }

            $user   =   User::where('applier_id','=',$idUser)->first();
            if (Auth::attempt(['id'=>$user->id,'password'=>$request->password],$remember = false))
            {
                return response()->json([
                    'token'  =>  $user->createToken($user->id)
                                ->plainTextToken,
                    'message'=> 'Succsess!!!',
                    'device' => Browser::deviceType(),
                    'browser'=> Browser::userAgent(),
                    'ip'     => $request->ips(),
                ]);
            }
            else
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Contraseña Incorrecta',
                ],401);
            }
        }


        catch (\Throwable $th)
        {
            return response()->json([
                'status' => false,
                'message'=>'Unauthorized',
                'errors' => $th->getMessage()
             ],500);
        }

    }

}
