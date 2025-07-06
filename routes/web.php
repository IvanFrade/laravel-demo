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

// Index page with login and registration forms
Route::get('/', function () {
    return view('index');
})->middleware('guest');

// User routes
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

// User routes only check for login status
Route::middleware('auth')->group(function() {

    // Users home route
    Route::get('/home/{view}', function($view) {
    switch($view) {
        case 'books':
            $data = Book::all();
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
    })->name('home');

    // Book detail 
    Route::get('/books/{book_id}', function($book_id) {
        $book = Book::findOrFail($book_id);
        $bestCopy = CopyController::getBestCopyByBookId($book_id);
        return view('book-detail', compact('book', 'bestCopy'));
    })->name('book-detail');

    // Default view for users is book catalogue
    Route::redirect('/home', '/home/books');

    // User post routes
    Route::post('/start-loan/{copy_id}', [LoanController::class, 'startLoan']);
    Route::post('/home/stop-loan/{copy_id}', [LoanController::class, 'stopLoan']);

    // Logout needs user to be logged in (duh)
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

// Admin routes (checks if logged in and if current user has 'edit' permission)
Route::middleware(['auth', 'can:edit'])->group(function() {

    // Admin dashboard
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
    })->name('dashboard');

    // Default view for admin dashboard is loans listing
    Route::redirect('/dashboard', '/dashboard/list-loans');

    // Admin post routes
    Route::post('/dashboard/add-genre', [GenreController::class, 'addGenre']);
    Route::post('/dashboard/add-book', [BookController::class, 'addBook']);
    Route::post('/dashboard/add-copy', [CopyController::class, 'addCopy']);

    Route::put('/dashboard/edit/book/{id}', [BookController::class, 'editBook'])->name('books.edit');
    Route::post('/dashboard/edit/copy/{id}', [CopyController::class, 'editCopy'])->name('copies.edit');

    // Edit routes for books and copies
    Route::get('/dashboard/edit/book/{id}', function($id) {
        $book = \App\Models\Book::findOrFail($id);
        return view('edit', compact('book'));
    })->name('books.edit');

    Route::get('/dashboard/edit/copy/{id}', function($id) {
        $copy = \App\Models\Copy::findOrFail($id);
        $books = \App\Models\Book::all();
        return view('edit', compact('copy', 'books'));
    })->name('copies.edit');
});