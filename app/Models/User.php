<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Applier;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $fillable = [
        'user_id',
        'role_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function applier()
    {
        return $this->belongsTo(Applier::class);
    }

    public function dni()
    {
        return $this->belongsTo(Applier::class);
    }

    public function assists()
    {
        return $this->hasMany(Assist::class);
    }
}
