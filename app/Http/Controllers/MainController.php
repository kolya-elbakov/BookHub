<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getBook()
    {
        if (!Auth::check()) {
            return view('auth.login');
        } else {
            $books = Book::all($fillable);
        }
    }
}
