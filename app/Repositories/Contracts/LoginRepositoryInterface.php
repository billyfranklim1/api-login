<?php

namespace App\Repositories\Contracts;

interface LoginRepositoryInterface
{
    public function login(array $credentials);
}
