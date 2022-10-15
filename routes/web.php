<?php

use Illuminate\Support\Facades\Route;
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


Route::get('/user/{id}/{name}', function () {
    $url = route('url', ['id' => 3, 'name' => 'ahmad']);
    return "the link is" . $url;
})->name('url');
// Route::get('/contact', function () {
//     return view('contact');
// });


Route::get('/profile', function () {
    return view('profile');
});
