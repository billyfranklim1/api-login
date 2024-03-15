<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\LoginRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginRepository implements LoginRepositoryInterface
{
    public function login(array $credentials)
    {
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw new \Exception('The provided credentials are incorrect.');
        }

        return $user->createToken('token')->plainTextToken;
    }

}
