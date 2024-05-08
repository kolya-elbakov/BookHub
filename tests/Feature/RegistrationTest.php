<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $this->withoutMiddleware();

        $email = 'test' . uniqid() . '@mail.ru';

        $response = $this->post('/registration', [
            'name' => 'testName',
            'surname' => 'testSurname',
            'email' => $email,
            'password' => 'password',
        ]);

        $response->assertRedirect('dashboard');
    }
}
