<?php

namespace App\Http\Controllers;

use App\model\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function createGenre(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:genres',
            'description' => 'required',
        ]);

        $data['name'] = strip_tags($data['name']);
        $data['description'] = strip_tags($data['description']);

        Genre::create($data);
        return redirect('/');
    }
}
