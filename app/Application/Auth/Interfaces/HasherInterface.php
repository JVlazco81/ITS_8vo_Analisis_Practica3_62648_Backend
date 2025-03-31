<?php

namespace App\Application\Auth\Interfaces;

interface HasherInterface
{
    public function make(string $password): string;
}