<?php

use App\Models\Book;
use App\Models\Copy;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LoanController;    
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;

// Index has login and registration forms
Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::get('/home/{view}', function($view) {
    switch($view) {
        case 'books':
            $data = CopyController::getAvailableCopies();
            break;
        case 'loans':
            $data = LoanController::getUserOngoingLoans();
            break;
        case 'profile':
            $data = [];
            break;
        default:
            abort(404);
    }

    return view('home', compact('data', 'view'));
})->middleware('auth')->name('home');

// Default view for users is book catalogue
Route::redirect('/home', '/home/books');

Route::get('/dashboard/{el}', function($el) {
    switch($el) {
        case 'add-genre':
            $data = [];
            break;
        case 'add-book':
            $data = GenreController::getGenres();
            break;
        case 'add-copy':
            $data = BookController::getBooks();
            break;
        case 'list-books':
            $data = Book::all();
            break;
        case 'list-copies':
            $data = CopyController::getCopies();
            break;
        case 'list-loans':
            $data = LoanController::getAllOngoingLoans();
            break;
        case 'list-users':
            $data = User::all();
            break;
        default:
            abort(404);
    }

    return view('dashboard', compact('data', 'el'));
})->middleware('auth')->name('dashboard');

// Default view for admin dashboard is loans listing
Route::redirect('/dashboard', '/dashboard/list-loans');

// User routes
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Genre routes
Route::post('/dashboard/add-genre', [GenreController::class, 'addGenre']);

// Book routes
Route::post('/dashboard/add-book', [BookController::class, 'addBook']);

// Copy routes
Route::post('/dashboard/add-copy', [CopyController::class, 'addCopy']);

// Loan routes
Route::post('/start-loan/{copy_id}', [LoanController::class, 'startLoan']);
Route::post('/home/stop-loan/{copy_id}', [LoanController::class, 'stopLoan']);