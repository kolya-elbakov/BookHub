<?php

namespace App\Http\Controllers;

use App\Components\AuthorClient;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    protected $authorClient;

    public function __construct(AuthorClient $authorClient)
    {
        $this->authorClient = $authorClient;
    }

    public function addBookForm()
    {
        return view('addBook');
    }

    public function addBook(BookRequest $request)
    {
        $validated = $request->validated();

        $images = $request->hasFile('images') ? $images = $request->file('images') : [];


        try {
            DB::transaction(function () use ($validated, $images) {
                $book = Book::create([
                    'book_name' => $validated['book_name'],
                    'user_id' => Auth::id(),
                    'author' => $validated['author'],
                    'genre' => $validated['genre'],
                    'date_publication' => $validated['date_publication'],
                    'condition' => $validated['condition'],
                ]);

                foreach ($images as $image) {
                    $imagePath = $image->store('images', 'public');
                    $book->images()->create(['image_path' => $imagePath]);
                }
            });
            return redirect()->route('my-profile')->withSuccess('Книга успешно добавлена');
        } catch(\Exception $exception) {
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
            if ($request->hasFile('images')) {
                DB::transaction(function () use ($request, $book, $data) {
                    $book->images()->delete();
                    $images = $request->file('images');
                    foreach ($images as $image) {
                        $imagePath = $image->store('images', 'public');
                        $book->images()->create(['image_path' => $imagePath]);
                    }
                    $book->update($data);
                });
            }
            return redirect('my-profile')->with('success', 'Книга успешно обновлена.');
        } catch(\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors('Произошла ошибка при обновлении книги.');
        }
    }

    public function deleteBook(int $id)
    {
        $book = Book::find($id);

//        $book->images()->delete();
        $book->delete();

        return redirect('my-profile')->with('success', 'Книга удалена.');
    }

    public function show($id)
    {
        $book = Book::find($id);
        $user = User::find($book->user_id);

        return view('book', ['book'=>$book], ['user'=>$user]);
    }

    public function getBooksByQuery(Request $request, $query = null)
    {
        $books = Book::query();
        $authorData = null;

        if ($query) {
            if ($request->has('author')) {
                $author = urldecode($query);
                $authorData = $this->authorClient->searchAuthor($author);
                $books->where('author', $author);
            } elseif ($request->has('genre')) {
                $books->where('genre', $query);
            }
        }

        return view('bookByQuery', [
            'books' => $books->get(),
            'authorData' => $authorData,
            'genre' => $request->has('genre') ? $query : null,
        ]);
    }

    public function getMyBooks()
    {
        $user = Auth::user();
        $userBooks = $user->books;
        return view('my-profile', ['userBooks'=>$userBooks], ['user'=>$user]);
    }
}
