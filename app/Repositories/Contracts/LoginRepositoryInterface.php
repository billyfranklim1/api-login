<?php

namespace App\Repositories\Contracts;

interface LoginRepositoryInterface
{
    public function login(array $credentials);
    public function register(array $data);
    public function logout();
    public function refresh();
    public function me();
}
