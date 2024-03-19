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

        $book = null;

        try{
            Book::beginTransaction();

            $book = Book::create([
                'book_name' => $validated['book_name'],
                'user_id' => Auth::id(),
                'author' => $validated['author'],
                'genre' => $validated['genre'],
                'date_publication' => $validated['date_publication'],
                'condition' => $validated['condition'],
            ]);

            if ($request->hasFile('images')) {
                $images = $request->file('images');

                foreach ($images as $image) {
                    $imagePath = $image->store('images', 'public');
                    $book->images()->create(['image_path' => $imagePath]);
                }
            }

            Book::commit();
            return redirect()->route('My-profile')->withSuccess('Книга успешно добавлена');

        } catch(\Exception $exception) {
            if($book){
                $book->delete();
            }
            Book::rollBack();

            return redirect()->back()->withErrors('Произошла ошибка. Книга не загрузилась');
        }
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

        if ($request->hasFile('images')) {
            $book->images()->delete();

            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath = $image->store('images', 'public');
                $book->images()->create(['image_path' => $imagePath]);
            }
        }

        $book->update($data);

        return redirect('My-profile')->with('success', 'Книга успешно обновлена.');
    }

    public function deleteBook(int $id)
    {
        $book = Book::find($id);
        $book->images()->delete();
        $book->delete();

        return redirect('My-profile')->with('success', 'Книга удалена.');
    }
}
