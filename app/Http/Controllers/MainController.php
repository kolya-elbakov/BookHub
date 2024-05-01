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
        $user = Auth::user();
        $allBooks = Book::where('user_id', '!=', $user->id)->get();
        return view('main', ['allBooks'=>$allBooks, 'user'=>$user]);
    }
}
