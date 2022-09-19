<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'applier_id',
        'fecha_Asi',
        'hora_Asi',
        'dni',
        'nombres_com',
        'plataforma' ,
        'sistema_op',
        'tipo_disp',
       'useragent',
       'usertime',
        'ip_usu',
        'nro_int',
    //    'estado_asist',
        'turno'

    ];

    protected $guarded = [
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
