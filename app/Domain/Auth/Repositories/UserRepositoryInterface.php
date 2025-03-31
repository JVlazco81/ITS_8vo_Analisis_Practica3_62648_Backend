<?php

namespace App\Domain\Auth\Repositories;

use App\Domain\Auth\Entities\User;

interface UserRepositoryInterface
{
    public function save(User $user): mixed;

    public function findByEmail(string $email): ?User;
}