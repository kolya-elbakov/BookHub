<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function getGenres()
    {
        $genres = Book::select('genre', DB::raw('COUNT(*) as book_count'))
            ->groupBy('genre')
            ->get();

        return view('genre', ['genres'=>$genres]);
    }
}
