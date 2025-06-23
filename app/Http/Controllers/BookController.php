<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function createBook(Request $request) {
        $data = $request->validate([
            'title' => 'required|unique:books',
            'author' => 'required',
            'publisher' => 'nullable',
            'year' => 'nullable',
            'description' => 'nullable',
            'genre_id' => 'required',
            'user_id' => 'required',
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['author'] = strip_tags($data['author']);
        $data['publisher'] = strip_tags($data['publisher']);
        $data['year'] = strip_tags($data['year']);
        $data['description'] = strip_tags($data['description']);
        $data['user_id'] = auth()->id();

        Genre::create($data);
        return redirect('/');
    }
}
