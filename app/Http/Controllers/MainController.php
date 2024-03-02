<?php

namespace App\Http\Controllers;

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
            return view('main', ['userBooks'=>$allBooks], ['user'=>$user]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function getGenre()
    {
        $genres = Book::select('genre', DB::raw('COUNT(*) as book_count'))
            ->groupBy('genre')
            ->get();

        return view('genre', ['genres'=>$genres]);
    }

    public function getAuthor()
    {
        $authors = Book::select('author', DB::raw('COUNT(*) as author_count'))
            ->groupBy('author')
            ->get();
        return view('author', ['authors'=>$authors]);

    }

    public function show($id)
    {
        $book = Book::find($id);
        $user = User::find($book->user_id);

        return view('book-show', ['book'=>$book], ['user'=>$user]);
    }
}
