<?php

namespace App\Http\Controllers;

use App\Contracts\EmailInterface;
use App\Http\Requests\ApplicationRequest;
use App\Jobs\SendEmailJob;
use App\Models\Application;
use App\Models\Book;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    private EmailInterface $emailService;

    public function __construct(EmailInterface $emailService)
    {
        $this->emailService = $emailService;
    }

    public function getApplicationForm(int $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userBooks = $user->books;
            $book = Book::find($id);
            return view('application', ['userBooks'=>$userBooks], ['book'=>$book]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    public function createApplication(ApplicationRequest $request, int $id)
    {
        $validate = $request->validate([
            'sender_book_id' => 'required|numeric',
            'message' => 'required|string',
        ]);

        $senderUserId = Auth::id();
        $senderBookId = $request->input('sender_book_id');

        $recipientBook = Book::find($id);
        $recipientUserId = $recipientBook->user_id;

        $application = new Application();
        $application->sender_user_id = $senderUserId;
        $application->recipient_user_id = $recipientUserId;
        $application->sender_book_id = $senderBookId;
        $application->recipient_book_id = $id;
        $application->date_application = now();
        $application->status = 'pending';
        $application->message = $validate['message'];
        $application->save();

        SendEmailJob::dispatch($application);

        return redirect('success')->with('success', 'Заявка успешно создана!');
    }

    public function getSuccessForm()
    {
        return view('success');
    }

    public function getApplicationInfo()
    {
        $user = Auth::user();
        $userApplics = Application::where('recipient_user_id', $user->id)->where('status', 'pending')->get();

        return view('applic-book', compact('userApplics'));
    }

    public function confirmApplication(int $id)
    {
        $application = Application::find($id);

        if($application) {
            $application->status = 'confirmed';

            $application->save();

            $senderBook = Book::find($application->sender_book_id);
            $recipientBook = Book::find($application->recipient_book_id);

            $senderBook->update(['user_id' => $application->recipient_user_id]);
            $recipientBook->update(['user_id' => $application->sender_user_id]);

            return redirect('success')->with('success', 'Заявка успешно подтверждена и книги обменены!');
        } else {
            return redirect()->back()->withErrors('Заявка не найдена.');
        }
    }

    public function rejectApplication(int $id)
    {
        $application = Application::find($id);

        if($application) {
            $application->status = 'rejected';

            $application->save();

            return redirect('success')->with('success', 'Заявка успешно отклонена');
        }
    }
}
