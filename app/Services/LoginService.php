<?php

namespace App\Services;

use App\Repositories\Contracts\LoginRepositoryInterface;

class LoginService
{
    protected $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function loginService(array $credentials)
    {
        return $this->loginRepository->login($credentials);
    }
}
