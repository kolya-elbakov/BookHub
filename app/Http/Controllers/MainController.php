<?php

namespace App\Http\Controllers;

use App\Components\AuthorClient;
use App\Models\Application;
use App\Models\Book;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getMain()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $allBooks = Book::where('user_id', '!=', $user->id)->get();
            return view('main', ['allBooks'=>$allBooks, 'user'=>$user]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
