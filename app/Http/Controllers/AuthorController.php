<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function getAuthors()
    {
        $authors = Book::select('author', DB::raw('COUNT(*) as author_count'))
            ->groupBy('author')
            ->get();
        return view('author', ['authors'=>$authors]);
    }
}
