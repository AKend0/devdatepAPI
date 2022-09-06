<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'country_id',
        'nombre'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

}
