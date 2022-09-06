<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Sdkconsultoria\WhatsappCloudApi\Waba\SendMessage;

class WhatsappController extends Controller
{
    private string $url = 'https://graph.facebook.com/';

    public string $endpoint = 'messages';


   public function __invoke(Request $request, Client $client)
   {
        //Validacion de las entradas
        $validation= Validator::make($request->all(),[
            'phone' =>  'required|integer',
            'body'=>    'required|string'
        ]);

        //Respuesta si la validacion de datos falla
        if($validation->fails())
        {
            return response()->json([
            'status' => false,
            'message' => 'Hubo un problema en la validación. Porfavor, inténtelo nuevamente.',
            'errors' => $validation->errors()
            ],401);
        }

        //Se guardan los datos ingresados en memoria
        $phone = $request->phone;
        $body = $request->body;

        //Se hace la solicitud principal con todos los requerimientos de Whatsapp's API
        $response = $client->request('POST',$this->urlGenerator($this->endpoint),
        [
            'headers'=>
            [
                'Content-Type'=>'application/json',
                'Authorization'=>'Bearer '.config('whatsappcloudapi.token')
            ],
            'json'=>$this->jsonGenerator($phone, $body)
        ]
        );
        //2|ZGeZokjcmYK70Gu5XMEpERfNDobD2AeOAHGOprlk
        return response()->json([
                'phone'     => $phone,
                'body'      => $body,
            ],$response->getStatusCode());
   }

   private function urlGenerator($endpoint)
   {
        $this->url .= config('whatsapp.api_version');

        $this->url .= '/' . config('whatsapp.phone_number_id');

        $this->url .= '/' . $endpoint;

        return $this->url;
   }

   private function jsonGenerator(int $phone, string $body)
   {
        $json = [
            'messaging_product' => 'whatsapp',
            'recipient_type'    => 'individual',
            'to'                => $phone,
            'type'              => 'text',
            'text'              => array('body' => $body)
        ];

        return $json;
   }
}
