<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario  extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = ["codusr", "password", "idrol"];
    protected $increments = false;
    protected $table = "usuario";

    public function idrol()
    {
        return  $this->belongsTo("App\Models\Rol", "idrol", "id");
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
