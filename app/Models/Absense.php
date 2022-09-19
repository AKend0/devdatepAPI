<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absense extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'applier_id',
        'fecha',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
