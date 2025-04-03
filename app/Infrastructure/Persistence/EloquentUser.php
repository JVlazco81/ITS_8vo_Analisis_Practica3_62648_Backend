<?php

namespace App\Infrastructure\Persistence;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class EloquentUser extends Authenticatable implements JWTSubject
{
    protected $table = 'users'; //que tabla usar
    
    protected $fillable = ['name', 'email', 'password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}