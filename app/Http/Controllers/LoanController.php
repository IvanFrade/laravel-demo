<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function startLoan(Request $request, $copy_id) {
        $data['copy_id'] = $copy_id;
        $data['user_id'] = auth()->id();
        $data['borrowed_at'] = now();

        Loan::create($data);

        DB::table('copies')
            ->where('id', $copy_id)
            ->update(['available' => 0]);

        return redirect('/home/books');
    }

    public function stopLoan(Request $request, $copy_id) {
        DB::table('copies')
            ->where('id', $copy_id)
            ->update(['available' => 1]);

        DB::table('loans')
            ->where('copy_id', $copy_id)
            ->update(['returned_at' => now()]);

        return redirect('/home/loans');
    }

    public static function getUserOngoingLoans() {
        $data = DB::select('SELECT copies.id AS copyId,
                                                    books.id AS bookId,
                                                    books.title,
                                                    books.author,
                                                    books.year,
                                                    copies.condition,
                                                    loans.borrowed_at
                                            FROM copies 
                                            INNER JOIN books 
                                            ON copies.book_id = books.id
                                            INNER JOIN loans
                                            ON loans.copy_id = copies.id
                                            WHERE loans.user_id = ?
                                            AND loans.returned_at IS NULL
                                            ORDER BY books.title, copies.condition DESC', 
                                            [auth()->id()]);

        return $data;
    }

    public static function getAllOngoingLoans() {
        $data = DB::select('SELECT copies.id AS copyId,
                            books.id AS bookId,
                            users.username,
                            books.title,
                            books.author,
                            books.year,
                            copies.condition,
                            loans.borrowed_at
                            FROM copies 
                            INNER JOIN books 
                            ON copies.book_id = books.id
                            INNER JOIN loans
                            ON loans.copy_id = copies.id
                            INNER JOIN users
                            ON loans.user_id = users.id
                            WHERE loans.returned_at IS NULL
                            ORDER BY books.title, copies.condition DESC');

        return $data;
    }
}
