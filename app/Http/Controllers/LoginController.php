<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Login the user and return the token
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $token = $this->loginService->loginService($credentials);
        if (!$token) {
            return response()->json(['error' => 'Credentials do not match'], 401);
        }
        return new LoginResource($token);
    }

    /**
     * Register a new user and return the token
     */
    public function register(RegisterRequest $request)
    {
        $credentials = $request->validated();
        $token = $this->loginService->registerService($credentials);
        return new LoginResource($token);
    }

    /**
     * Logout the user
     */
    public function logout()
    {
        $this->loginService->logoutService();
        return response()->json(null, 204);
    }


    /**
     * Refresh the token
     */
    public function refresh()
    {
        $user = $this->loginService->refreshService();
        return new LoginResource($user);
    }

    /**
     * Get the authenticated user
     */
    public function me()
    {
        $user = $this->loginService->meService();
        return new LoginResource($user);
    }

}
