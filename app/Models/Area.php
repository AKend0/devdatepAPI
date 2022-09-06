<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'division_id',
        'nombre'
    ];

    public function perfils()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
