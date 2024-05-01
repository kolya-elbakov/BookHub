<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Services\RabbitMQService;
use Illuminate\Support\Facades\DB;



class ApplicationController extends Controller
{
    private RabbitMQService $rabbitMQService;

    public function __construct(RabbitMQService $rabbitMQService)
    {
        $this->rabbitMQService = $rabbitMQService;
    }

    public function getApplicationForm(int $bookId)
    {
        $user = Auth::user();
        $userBooks = $user->books;
        $book = Book::find($bookId);
        return view('application', ['userBooks' => $userBooks], ['book' => $book]);
    }

    public function createApplication(ApplicationRequest $request, int $bookId)
    {
            $validated = $request->validated();

            $senderUserId = Auth::id();
            $senderBookId = $request->input('sender_book_id');

            $recipientBook = Book::find($bookId);
            $recipientUserId = $recipientBook->user_id;

            $application = new Application();
            $application->sender_user_id = $senderUserId;
            $application->recipient_user_id = $recipientUserId;
            $application->sender_book_id = $senderBookId;
            $application->recipient_book_id = $bookId;
            $application->status = Application::STATUS_PENDING;
            $application->message = $validated['message'];
            $application->save();

            if($application) {
                $this->rabbitMQService->publish('email_queue', $application->id);
            }
            return redirect('success')->with('success', 'Заявка успешно создана!');
    }

    public function getSuccessForm()
    {
        return view('success');
    }

    public function getApplications()
    {
        $user = Auth::user();
        $userApplics = $user->receivedApplications()->where('status', Application::STATUS_PENDING)->get();

        return view('applic-book', compact('userApplics'));
    }

    public function confirmApplication(int $id)
    {
        $application = Application::findOrFail($id);

        $application->status = Application::STATUS_CONFIRMED;

        $senderBook = Book::find($application->sender_book_id);
        $recipientBook = Book::find($application->recipient_book_id);

        DB::transaction(function () use ($application, $senderBook, $recipientBook) {

            $application->save();

            $senderBook->update(['user_id' => $application->recipient_user_id]);
            $recipientBook->update(['user_id' => $application->sender_user_id]);
        });

        return redirect('applic-book')->with('success', 'Заявка успешно подтверждена и книги обменены!');
    }

    public function rejectApplication(int $id)
    {
        $application = Application::findOrFail($id);

            $application->status = Application::STATUS_REJECTED;

            $application->save();

            return redirect('applic-book')->with('success', 'Заявка успешно отклонена');
    }
}
