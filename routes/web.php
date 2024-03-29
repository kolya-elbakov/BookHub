<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [UserController::class, 'registration'])->name('register');
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('signout', [UserController::class, 'signOut'])->name('signout');

Route::middleware('auth')->get('books', [MainController::class, 'getBook'])->name('books');

Route::get('books-genre', [MainController::class, 'getGenre'])->name('books-genre');
Route::get('genre/{genre}', [MainController::class, 'getBookByGenre'])->name('genre');

Route::get('books-author', [MainController::class, 'getAuthor'])->name('books-author');
Route::get('author/{author}', [MainController::class, 'getBookByAuthor'])->name('author');


Route::get('/book-show/{id}', [MainController::class, 'show'])->name('book-show');

Route::middleware('auth')->get('/application/{id}', [ApplicationController::class, 'getApplicationForm'])->name('application');
Route::middleware('auth')->post('/create-application/{id}', [ApplicationController::class, 'createApplication'])->name('create-application');

Route::get('/success', [ApplicationController::class, 'getSuccessForm'])->name('success');

Route::middleware('auth')->get('My-profile', [ProfileController::class, 'getMyBook'])->name('My-profile');

Route::get('/add-book-form', [BookController::class, 'addBookForm'])->name('add-book-form');
Route::middleware('auth')->post('/add-book-save', [BookController::class, 'addBook'])->name('add-book-save');

Route::get('update-book/{bookId}', [BookController::class, 'getEditForm'])->name('update-book-form');
Route::post('update-book/{bookId}', [BookController::class, 'edit'])->name('update-book');

Route::get('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('delete-book');

Route::get('/applic-book', [ApplicationController::class, 'getApplicationInfo'])->name('applic-book');

Route::post('confirm-application/{id}', [ApplicationController::class, 'confirmApplication'])->name('confirm-application');
Route::post('reject-application/{id}', [ApplicationController::class, 'rejectApplication'])->name('reject-application');

Route::get('user-profile/{id}', [ProfileController::class, 'getUserProfile'])->name('user-profile');

Route::get('reviews/{id}', [ReviewController::class, 'getReviewsForm'])->name('reviews');

Route::get('create-review/{id}', [ReviewController::class, 'getCreateReviewForm'])->name('create.review');
Route::post('create-review/{id}', [ReviewController::class, 'createReview'])->name('create-review');

Route::middleware('auth')->get('send-email/{application}',[MailController::class, 'sendExchangeRequest']);
