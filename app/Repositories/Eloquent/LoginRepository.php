<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\LoginRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginRepository implements LoginRepositoryInterface
{
    public function login(array $credentials)
    {
        $user = User::where('username', $credentials['username'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return null;
        }

        return $user;
    }

    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function logout()
    {
        Auth::logout();
    }

    public function refresh()
    {
        $userId = Auth::id();
        return User::find($userId);
    }

    public function me()
    {
        return Auth::user();
    }


}
