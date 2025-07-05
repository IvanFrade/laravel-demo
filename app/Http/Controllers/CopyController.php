<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CopyController extends Controller
{
    public function addCopy(Request $request) {
        // ID is a (10 digit) random barcode
        // Get a random 10 digit int to use as id later
        do {
            $id = random_int(1000000000, 9999999999);
        } while (\App\Models\Loan::where('id', $id)->exists());
        
        $data = $request->validate([
            'book_id' => 'required',
            'condition' => 'required',
            'available' => 'required',
            'notes' => 'nullable',
        ]);

        $data['id'] = $id;
        $data['book_id'] = strip_tags($data['book_id']);
        $data['condition'] = strip_tags($data['condition']);
        $data['available'] = strip_tags($data['available']);
        $data['notes'] = strip_tags($data['notes']);


        Copy::create($data);
        
        return redirect('/dashboard/add-copy');
    }

    public static function getCopies() {
        $data = DB::select('SELECT *,
                            copies.id AS copyId
                            FROM copies INNER JOIN books 
                            WHERE copies.book_id = books.id 
                            ORDER BY books.title');

        return $data;
    }

    public static function getAvailableCopiesByBookId() {
        $data = DB::select('SELECT copies.id AS copyId,
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

        return $data;
    }

    public static function getBestCopyByBookId($bookId) {
        // Priority: ottima > buona > accettabile
        $conditions = ['ottima', 'buona', 'accettabile'];
        foreach ($conditions as $condition) {
            $copy = DB::table('copies')
                ->where('book_id', $bookId)
                ->where('available', 1)
                ->where('condition', $condition)
                ->orderBy('id')
                ->first();
            if ($copy) {
                return $copy;
            }
        }
        return null;
    }
}
