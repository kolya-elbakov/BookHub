<?php

namespace App\Http\Controllers;

//use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Book;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function getApplicationForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userBooks = $user->books;
            $book = Book::all();
            return view('application', ['userBooks'=>$userBooks], ['book'=>$book]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    public function createApplication(ApplicationRequest $request, $id)
    {
        $application = new Application();
        $application->sender_user_id = Auth::id();
        $application->recipient_user_id = $request->input('recipient_user_id');
        $application->sender_book_id = $request->sender_book_id;
        $application->recipient_book_id = $id;
        $application->date_application = now();
        $application->status = 'pending';
        $application->message = $request->input('message');
        $application->save();

        return redirect("success")->back()->with('success', 'Заявка успешно создана!');
    }

    public function getSuccessForm()
    {
        return view('success');
    }
}
