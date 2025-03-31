<?php

namespace App\Infrastructure\Services;

use App\Application\Auth\Interfaces\HasherInterface;
use Illuminate\Support\Facades\Hash;

class LaravelHasher implements HasherInterface
{
    public function make(string $password): string
    {
        return Hash::make($password);
    }
}
