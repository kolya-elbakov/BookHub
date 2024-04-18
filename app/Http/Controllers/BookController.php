<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::beginTransaction();

        try{
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

            DB::commit();
            return redirect()->route('My-profile')->withSuccess('Книга успешно добавлена');

        } catch(\Exception $exception) {
            DB::rollBack();
            Log::error($exception);
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

        try {
            DB::transaction(function () use ($request, $book, $data) {
                if ($request->hasFile('images')) {
                    $book->images()->delete();
                    $images = $request->file('images');
                    foreach ($images as $image) {
                        $imagePath = $image->store('images', 'public');
                        $book->images()->create(['image_path' => $imagePath]);
                    }
                }
                $book->update($data);
            });

            return redirect('My-profile')->with('success', 'Книга успешно обновлена.');
        } catch(\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors('Произошла ошибка при обновлении книги.');
        }
    }

    public function deleteBook(int $id)
    {
        $book = Book::find($id);

        DB::transaction(function () use ($book) {
            $book->images()->delete();
            $book->delete();
        });
        return redirect('My-profile')->with('success', 'Книга удалена.');
    }
}
