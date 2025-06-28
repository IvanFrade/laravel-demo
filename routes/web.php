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
});

// Home view for standard users
Route::get('/home', function () {
    $availableCopies =  [];
    if (auth()->check()) {
        $availableCopies = CopyController::getAvailableCopies();
    }

    $currentlyLoanedCopies =  [];
    if (auth()->check()) {
        $currentlyLoanedCopies = LoanController::getUserOngoingLoans();
    }

    return view('home', ['availableCopies' => $availableCopies, 'currentlyLoanedCopies' => $currentlyLoanedCopies]);
});

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
});

// Default view for users is book catalogue
Route::redirect('/home', '/home/books');

Route::get('/dashboard/list/{table}', function($table) {
    switch($table) {
        case 'books':
            $data = Book::all();
            break;
        case 'copies':
            $data = CopyController::getCopies();
            break;
        case 'loans':
            $data = LoanController::getAllOngoingLoans();
            break;
        case 'users':
            $data = User::all();
            break;
        default:
            abort(404);
    }

    return view('dashboard_list', compact('data', 'table'));
})->name('list');

Route::get('/dashboard/add/{el}', function($el) {
    switch($el) {
        case 'genre':
            $data = [];
            break;
        case 'book':
            $data = GenreController::getGenres();
            break;
        case 'copy':
            $data = BookController::getBooks();
            break;
        default:
            abort(404);
    }

    return view('dashboard_add', compact('data', 'el'));
})->name('add');

// Default view for dashboard is list of loans
Route::redirect('/dashboard', '/dashboard/list/loans');

// User routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Genre routes
Route::post('/add-genre', [GenreController::class, 'addGenre']);

// Book routes
Route::post('/add-book', [BookController::class, 'addBook']);

// Copy routes
Route::post('/add-copy', [CopyController::class, 'addCopy']);

// Loan routes
Route::post('/start-loan/{copy_id}', [LoanController::class, 'startLoan']);
Route::post('/home/stop-loan/{copy_id}', [LoanController::class, 'stopLoan']);