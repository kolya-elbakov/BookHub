<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_application(): void
    {
        $this->withoutMiddleware();
        $email = 'test' . uniqid() . '@mail.ru';

        $user = User::create([
            'name' => 'kolya',
            'surname' => 'elbakov',
            'email' => $email,
            'password' => '12345678'
            ]);
        $senderBook = Book::factory()->create(['user_id' => $user->id]);
        $recipientBook = Book::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('application', ['bookId' => $recipientBook->id]), [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'sender_book_id' => $senderBook->id,
            'message' => 'Хочу обменять книги!',
        ]);

        $response->assertRedirect('success');
        $response->assertSessionHas('success', 'Заявка успешно создана!');

        $this->assertDatabaseHas('applications', [
            'sender_user_id' => $user->id,
            'recipient_user_id' => $recipientBook->user_id,
            'sender_book_id' => $senderBook->id,
            'recipient_book_id' => $recipientBook->id,
            'status' => Application::STATUS_PENDING,
            'message' => 'Хочу обменять книги!',
        ]);
    }
}
