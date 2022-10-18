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

Route::get('/add', [booksController::class, 'add'])->name('add');

Route::get('/show/{id}', [booksController::class, 'show'])->name('show');

Route::post('/addBook', [booksController::class, 'store']);

Route::get('/update/{id}', [booksController::class, 'edit']);

Route::post('/updateBook/{id}', [booksController::class, 'update']);

Route::get('/delete/{id}', [booksController::class, 'destroy']);

Route::get('/forceDelete/{id}', [booksController::class, 'forceDelete']);

Route::get('/restore/{id}', [booksController::class, 'restore']);

Route::get('/restoreAll', [booksController::class, 'restoreAll']);

Route::get('/trash', [booksController::class, 'trash']);

Route::get('/authorForm', [booksController::class, 'authorForm']);

Route::get('/author/{id}', [booksController::class, 'author']);

Route::get('/addAuthor', [booksController::class, 'addAuthor']);

Route::post('/searchResults', [booksController::class, 'searchResults']);




Route::get('/profile', function () {
    return view('profile');
});


// ------------------------ User Settings --------------------------------

Route::get('/register', [userController::class, 'create']);

Route::post('/storeUser', [userController::class, 'store']);
