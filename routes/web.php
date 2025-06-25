<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;

// Index has login and registration forms
Route::get('/', function () {
    return view('index');
});

// Home view for standard users
Route::get('/home', function () {
    $availableCopies =  [];
    if (auth()->check()) {
        $availableCopies = CopyController::getAvailableCopies();
    }

    $currentlyLoanedCopies =  [];
    if (auth()->check()) {
        $currentlyLoanedCopies = CopyController::getUserCurrentLoans();
    }

    return view('home', ['availableCopies' => $availableCopies, 'currentlyLoanedCopies' => $currentlyLoanedCopies]);
});

Route::get('/dashboard', function() {  
    $books = [];
    if (auth()->check()) {
        $books = BookController::getBooks();
    }

    $genres = [];
    if (auth()->check()) {
        $genres = GenreController::getGenres();
    }

    return view('dashboard', ['books' => $books, 'genres' => $genres]);
});

// User routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// Post routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

// Genre routes
Route::post('/add-genre', [GenreController::class, 'addGenre']);

// Book routes
Route::post('/add-book', [BookController::class, 'addBook']);

// Copy routes
Route::post('/add-copy', [CopyController::class, 'addCopy']);

// Loan routes
Route::post('/start-loan/{copy_id}', [LoanController::class, 'startLoan']);
Route::post('/stop-loan/{copy_id}', [LoanController::class, 'stopLoan']);