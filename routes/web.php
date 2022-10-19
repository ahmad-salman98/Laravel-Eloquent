<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\booksController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// main page

Route::get('/', [booksController::class, 'index']);

Route::get('/books', [booksController::class, 'index']);

Route::get('/add', [booksController::class, 'add'])->name('add')->middleware('auth');

Route::get('/show/{id}', [booksController::class, 'show'])->name('show');

Route::post('/addBook', [booksController::class, 'store'])->middleware('auth');

Route::get('/update/{id}', [booksController::class, 'edit'])->middleware('auth');

Route::post('/updateBook/{id}', [booksController::class, 'update'])->middleware('auth');

Route::get('/delete/{id}', [booksController::class, 'destroy'])->middleware('auth');

Route::get('/forceDelete/{id}', [booksController::class, 'forceDelete'])->middleware('auth');

Route::get('/restore/{id}', [booksController::class, 'restore'])->middleware('auth');

Route::get('/restoreAll', [booksController::class, 'restoreAll'])->middleware('auth');

Route::get('/trash', [booksController::class, 'trash'])->middleware('auth');

Route::get('/authorForm', [booksController::class, 'authorForm'])->middleware('auth');

Route::get('/author/{id}', [booksController::class, 'author']);

Route::get('/addAuthor', [booksController::class, 'addAuthor'])->middleware('auth');

Route::post('/searchResults', [booksController::class, 'searchResults']);




Route::get('/profile', function () {
    return view('profile');
});


// ------------------------ User Settings --------------------------------

Route::get('/register', [userController::class, 'create'])->middleware('guest');

Route::get('/loginForm', [userController::class, 'loginForm'])->name('login')->middleware('guest');

Route::post('/login', [userController::class, 'authenticate'])->middleware('guest');

Route::post('/storeUser', [userController::class, 'store'])->middleware('guest');

Route::get('/logout', [userController::class, 'logout'])->middleware('auth');
