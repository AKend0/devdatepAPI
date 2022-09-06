<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokenPassword;
use App\Models\User;
use App\Mail\SendTokenResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{

    public function __invoke(Request $request)
    {
        $email  = $request->email;

        $applier   = DB::table('appliers')->where('email',$email)->first('id');

        $user   =   User::where('applier_id','=',$applier->id)->first();


        if ($user)
        {

            $newToken = new TokenPassword();

            $newToken->user_id = $user->id;
            $newToken->token_password=bin2hex(random_bytes(3));
            $newToken->status=true;
            $newToken->save();


            $correo = new SendTokenResetPassword($newToken->token);
            Mail::to($user->applier->email)->send($correo);

            return response()->json([
                "message" => "correo enviado !  , revisa tu bandeja de entrada",
            ]);
        }


        return redirect()->json([
            "message" => "error",
        ]);
    }
}
