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
        $copies = DB::select('SELECT * FROM copies INNER JOIN books WHERE copies.book_id = books.id');

        return $copies;
    }

    public static function getAvailableCopies() {
        $availableCopies = DB::select('SELECT * FROM copies INNER JOIN books WHERE copies.available = 1 AND copies.book_id = books.id');

        return $availableCopies;
    }
}
