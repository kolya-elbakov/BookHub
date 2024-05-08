<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_returns_a_successful_response(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $this->withoutMiddleware();
        $email = 'test' . uniqid() . '@mail.ru';

        $user = User::create([
            'name' => 'kolya',
            'surname' => 'elbakov',
            'email' => $email,
            'password' => Hash::make('12345678')
        ]);
        $response =  $this->withSession(['_token' => csrf_token()])->post('/login', [
            'email' => $user->email,
            'password' => '12345678'
        ]);

        $response->assertRedirect('/books');
        $this->assertAuthenticatedAs($user);
    }
}
