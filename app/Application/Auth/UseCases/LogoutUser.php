<?php

namespace App\Application\Auth\UseCases;

use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutUser
{
    public function execute(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}