<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'dni',
        'email',
        'phone',
        'image',
        'gender',
        'wsp_status',
        'observacion',
        'country_id',
        'platform_id',
        'division_id',
        'area_id',
        'perfil_id',
        'turn_id',
    ];

    protected $hidden = [
        'device',
        'ip',
    ];

    protected $casts = [
        'fecha_postulacion' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function platform()
    {
        return $this->hasOne(Platform::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function turn()
    {
        return $this->hasOne(Turn::class);
    }
    public function assists()
    {
        return $this->hasMany(Assist::class);
    }
    public function absences()
    {
        return $this->hasMany(Absense::class);
    }

}
