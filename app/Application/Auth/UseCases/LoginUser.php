<?php

namespace App\Application\Auth\UseCases;

use App\Application\Auth\Interfaces\HasherInterface;
use App\Application\Auth\Interfaces\JWTServiceInterface;
use App\Domain\Auth\Repositories\UserRepositoryInterface;
use Exception;

class LoginUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private HasherInterface $hasher,
        private JWTServiceInterface $jwtService
    ) {}

    public function execute(string $email, string $password): string
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user || !password_verify($password, $user->password)) {
            throw new Exception("Invalid credentials.");
        }

        return $this->jwtService->generateToken($user);
    }
}