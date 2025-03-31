<?php

namespace App\Application\Auth\Interfaces;

use App\Domain\Auth\Entities\User;

interface JWTServiceInterface
{
    public function generateToken(User $user): string;
}