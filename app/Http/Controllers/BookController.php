<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function addBookForm()
    {
        return view('addBook');
    }

    public function addBook(BookRequest $request)
    {
        $validated = $request->validated();

        $book = Book::create([
            'book_name' => $validated['book_name'],
            'user_id' => Auth::id(),
            'author' => $validated['author'],
            'genre' => $validated['genre'],
            'date_publication' => $validated['date_publication'],
            'condition' => $validated['condition'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            $book->save();

            $book->images()->create(['image_path' => $imagePath]);
        } else {
            $book->save();
        }

        return redirect()->route('My-profile')->withSuccess('Книга успешно добавлена');
    }

    public function getEditForm(int $id)
    {
        $book = Book::find($id);
        return view('update-book', ['book'=>$book]);
    }

    public function edit(BookRequest $request, $bookId)
    {
        $validated = $request->validated();

        $book = Book::find($bookId);
        $data = [
            'book_name' => $validated['book_name'],
            'user_id' => Auth::id(),
            'author' => $validated['author'],
            'genre' => $validated['genre'],
            'date_publication' => $validated['date_publication'],
            'condition' => $validated['condition'],
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            $image = $book->images->first() ?? new Image();
            $image->image_path = $imagePath;

            $image->save();
            $book->images()->save($image);
        }

        $book->update($data);

        return redirect('My-profile')->with('success', 'Книга успешно обновлена.');
    }
}