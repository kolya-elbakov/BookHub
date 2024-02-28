<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getBook()
    {
        if (Auth::check()) {
            $books = Book::all();
            return view('main', ['books'=>$books]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function getGenre()
    {
        $genres = Book::select('genre')->distinct()->get();

        return view('genre', ['genres'=>$genres]);
    }

    public function getAuthor()
    {
        $authors = Book::select('author')->distinct()->get();

        return view('author', ['authors'=>$authors]);
    }
}
