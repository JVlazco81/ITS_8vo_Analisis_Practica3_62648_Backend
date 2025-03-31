<?php

namespace App\Infrastructure\Services;

use App\Application\Auth\Interfaces\JWTServiceInterface;
use App\Domain\Auth\Entities\User as DomainUser;
use App\Models\User as EloquentUser;
use Tymon\JWTAuth\Facades\JWTAuth;

class LaravelJWTService implements JWTServiceInterface
{
    public function generateToken(DomainUser $user): string
    {
        $eloquentUser = EloquentUser::where('email', $user->email)->firstOrFail();
        return JWTAuth::fromUser($eloquentUser);
    }
}