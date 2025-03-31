<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Auth\Entities\User as DomainUser;
use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Models\User as EloquentUser;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function save(DomainUser $user): mixed
    {
        $eloquentUser = new EloquentUser();
        $eloquentUser->name = $user->name;
        $eloquentUser->email = $user->email;
        $eloquentUser->password = $user->password;
        $eloquentUser->save();

        return $eloquentUser;
    }

    public function findByEmail(string $email): ?DomainUser
    {
        $eloquentUser = EloquentUser::where('email', $email)->first();

        if (!$eloquentUser) {
            return null;
        }

        return new DomainUser(
            $eloquentUser->name,
            $eloquentUser->email,
            $eloquentUser->password
        );
    }
}