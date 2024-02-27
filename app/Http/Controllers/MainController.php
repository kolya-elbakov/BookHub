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
}
