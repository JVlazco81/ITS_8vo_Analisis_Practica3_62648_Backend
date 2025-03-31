<?php

namespace App\Application\Auth\UseCases;

use App\Application\Auth\Interfaces\HasherInterface;
use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Domain\Auth\Entities\User;

class RegisterUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private HasherInterface $hasher
    ) {}

    public function execute(string $name, string $email, string $password): User
    {
        $hashedPassword = $this->hasher->make($password);

        $user = new User($name, $email, $hashedPassword);

        $this->userRepository->save($user);

        return $user;
    }
}