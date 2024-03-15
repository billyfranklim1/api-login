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

    public function registerService(array $credentials)
    {
        return $this->loginRepository->register($credentials);
    }

    public function logoutService()
    {
        return $this->loginRepository->logout();
    }

    public function refreshService()
    {
        return $this->loginRepository->refresh();
    }

    public function meService()
    {
        return $this->loginRepository->me();
    }
}
