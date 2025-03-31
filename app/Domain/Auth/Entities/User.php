<?php

namespace App\Domain\Auth\Entities;

class User
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {}
}