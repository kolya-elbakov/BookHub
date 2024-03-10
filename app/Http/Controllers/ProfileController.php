<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getMyBook()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userBooks = $user->books;
            return view('my-profile', ['userBooks'=>$userBooks], ['user'=>$user]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function addBookForm()
    {
        return view('addBook');
    }

    public function addBook(BookRequest $request)
    {
        $validated = $request->validated();

        Book::create([
            'book_name' => $validated['book_name'],
            'user_id' => Auth::id(),
            'author' => $validated['author'],
            'genre' => $validated['genre'],
            'date_publication' => $validated['date_publication'],
            'condition' => $validated['condition'],
        ]);

        return redirect()->route('add-book-form')->withSuccess('Книга успешно добавлена');
    }
}
