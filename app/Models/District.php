<?php

namespace App\Models;

use App\Models\User;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'province_id',
        'nombre'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
