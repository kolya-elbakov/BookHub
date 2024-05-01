<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
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
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('register', [UserController::class, 'getRegistration'])->name('register');
Route::post('registration', [UserController::class, 'registration'])->name('registration');

Route::get('login', [UserController::class, 'getLogin'])->name('getLogin');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');


Route::middleware('auth')->get('books', [MainController::class, 'getMain'])->name('books');
Route::get('books/{query?}', [BookController::class, 'getBooksByQuery'])->name('booksByQuery');
Route::get('book/{bookId}', [BookController::class, 'show'])->name('book');


Route::get('genres', [GenreController::class, 'getGenres'])->name('genres');
Route::get('authors', [AuthorController::class, 'getAuthors'])->name('authors');


Route::middleware('auth')->get('application/{bookId}', [ApplicationController::class, 'getApplicationForm'])->name('application');
Route::middleware('auth')->post('application/{bookId}', [ApplicationController::class, 'createApplication'])->name('create-application');
Route::get('/applic-book', [ApplicationController::class, 'getApplications'])->name('applic-book');
Route::post('confirm-application/{id}', [ApplicationController::class, 'confirmApplication'])->name('confirm-application');
Route::post('reject-application/{id}', [ApplicationController::class, 'rejectApplication'])->name('reject-application');
Route::get('success', [ApplicationController::class, 'getSuccessForm'])->name('success');


Route::get('user-profile/{id}', [ProfileController::class, 'getUserProfile'])->name('user-profile');
Route::post('switch-profile/{userId}', [ProfileController::class, 'switchingProfileStatus'])->name('switch-profile');


Route::get('add-book', [BookController::class, 'addBookForm'])->name('add-book');
Route::middleware('auth')->post('add-book', [BookController::class, 'addBook'])->name('add-book-save');
Route::get('update-book/{bookId}', [BookController::class, 'getEditForm'])->name('update-book-form');
Route::post('update-book/{bookId}', [BookController::class, 'edit'])->name('update-book');
Route::get('delete-book/{bookId}', [BookController::class, 'deleteBook'])->name('delete-book');
Route::middleware('auth')->get('my-profile', [BookController::class, 'getMyBooks'])->name('my-profile');


Route::get('reviews/{userId}', [ReviewController::class, 'getReviewsForm'])->name('reviews');
Route::get('create-review/{userId}', [ReviewController::class, 'getCreateReviewForm'])->name('create.review');
Route::post('create-review/{userId}', [ReviewController::class, 'createReview'])->name('create-review');

Route::get('chat/{userId}', [MessageController::class, 'getChatForm'])->name('chat');
Route::post('create-message/{userId}', [MessageController::class, 'createMessage'])->name('create-message');
Route::get('delete-message/{messageId}', [MessageController::class, 'deleteMessage'])->name('delete-message');
Route::get('edit-message/{messageId}', [MessageController::class, 'getEditForm'])->name('edit-message');
Route::post('edit-message/{messageId}', [MessageController::class, 'editMessage']);
Route::get('my-chats', [MessageController::class, 'getMyChats'])->name('my-chats');

