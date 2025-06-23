<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function addGenre(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:genres',
            'description' => 'required',
        ]);

        $data['name'] = strip_tags($data['name']);
        $data['description'] = strip_tags($data['description']);
        

        Genre::create($data);
        
        return redirect('/');
    }

    public static function getGenres() {
        $genres = DB::table('genres')->get();

        return $genres;
    }
}
