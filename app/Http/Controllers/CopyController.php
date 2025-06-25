<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CopyController extends Controller
{
    public function addCopy(Request $request) {
        $data = $request->validate([
            'book_id' => 'required',
            'condition' => 'required',
            'available' => 'required',
            'notes' => 'nullable',
        ]);

        $data['book_id'] = strip_tags($data['book_id']);
        $data['condition'] = strip_tags($data['condition']);
        $data['avaiable'] = strip_tags($data['available']);
        $data['notes'] = strip_tags($data['notes']);


        Copy::create($data);
        
        return redirect('/');
    }

    public static function getCopies() {
        $copies = DB::select('SELECT * 
                                FROM copies INNER JOIN books 
                                WHERE copies.book_id = books.id 
                                ORDER BY books.title');

        return $copies;
    }

    public static function getAvailableCopies() {
        $availableCopies = DB::select('SELECT copies.id AS copyId,
                                              books.id AS bookId,
                                              books.title,
                                              books.author,
                                              books.year,
                                              copies.condition,
                                              copies.available 
                                        FROM copies 
                                        INNER JOIN books 
                                        ON copies.book_id = books.id
                                        WHERE copies.available = 1 
                                        ORDER BY books.title, copies.condition DESC');

        return $availableCopies;
    }

    public static function getUserCurrentLoans() {
        $currentlyLoadedCopies = DB::select('SELECT copies.id AS copyId,
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

        return $currentlyLoadedCopies;
    }
}
