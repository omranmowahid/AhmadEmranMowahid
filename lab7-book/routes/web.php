<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login'); // when user head our website, user automatically redirected to /login page instead of just / (root)

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register'); // we normally view, actually viewing usually handle in controller
    Route::post('/register', [AuthController::class, 'register'])->name('register.store'); // this route is responsible for post requests (like saving)
    Route::view('/login', 'auth.login')->name('login'); 
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { // get is response for get request of a url
        return view('books.create');})->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // post is responsible for submits
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/create', function() {return view('books.create');})->name('books.create');
});