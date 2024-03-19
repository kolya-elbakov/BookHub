<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getBook()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $allBooks = Book::where('user_id', '!=', $user->id)->get();
            $application = Application::first();
            return view('main', ['allBooks'=>$allBooks, 'user'=>$user, 'application'=>$application]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function getGenre()
    {
        $genres = Book::select('genre', DB::raw('COUNT(*) as book_count'))
            ->groupBy('genre')
            ->get();
        $books = Book::all();

        return view('genre', compact('genres', 'books'));
    }

    public function getBookByGenre($genre)
    {
        $books = Book::where('genre', $genre)->get();

        return view('bookByGenre', ['books'=>$books]);
    }

    public function getAuthor()
    {
        $authors = Book::select('author', DB::raw('COUNT(*) as author_count'))
            ->groupBy('author')
            ->get();
        $books = Book::all();

        return view('author', compact('authors', 'books'));
    }

    public function getBookByAuthor($author)
    {
        $books = Book::where('author', $author)->get();

        return view('bookByAuthor', ['books'=>$books]);
    }

    public function show($id)
    {
        $book = Book::find($id);
        $user = User::find($book->user_id);

        return view('book-show', ['book'=>$book], ['user'=>$user]);
    }
}
