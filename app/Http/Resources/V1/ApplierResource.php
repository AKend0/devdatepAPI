<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'dni'       =>  $this->dni,
            'nombre'    => $this->name,
            'apellido_paterno' => $this->apellidoP,
            'apellido_materno' => $this->apellidoM,
            'email' =>
                [
                    'email' => $this->email,
                    'verificacion_email'    =>$this->email_verified_at,
                ],
            'phone'     => $this->phone,
            'foto'      => $this->image,
            'genero'    => $this->gender,
            'pais_id'   => $this->country_id,
            'plataforma' => $this->platform_id,
            'division'  => $this->division_id,
            'area'   => $this->area_id,
            'perfil' => $this->perfil_id,
            'turno' => $this->turn_id,
            'fecha_postulacion' => $this->fecha_postulacion,
            'wsp_status' => $this->wsp_status,
            'observacion' => $this->observacion,
            'device' => $this->device,
            'ip' => $this->ip,
          ];
    }
}
