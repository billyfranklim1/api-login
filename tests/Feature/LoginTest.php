<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testUserRegistration()
    {
        $userData = [
            'name' => 'John Doe',
            'username' => 'john_doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(201);
        $response->assertJsonStructure(['user', 'token']);
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    public function testUserLogin()
    {
        User::factory()->create([
            'email' => 'jane@example.com',
            'username' => 'jane_doe',
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->postJson('/api/login', [
            'username' => 'jane_doe',
            'password' => $password,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    public function testUserLoginFailsWithInvalidCredentials()
    {
        $response = $this->postJson('/api/login', [
            'username' => 'nonexistentuser',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(422);
    }

    public function testUserLogout()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/logout');

        $response->assertStatus(204);
    }

    public function testTokenCanBeRefreshed()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/refresh');

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    public function testAuthenticatedUserCanRetrieveTheirDetails()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/me');

        $response->assertStatus(200);
        $response->assertJson([
            'user' => [
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
            ],
        ]);
    }




}

