<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function addBook(Request $request) {
        $data = $request->validate([
            'isbn' => 'required|unique:books',
            'title' => 'required|unique:books',
            'author' => 'required',
            'publisher' => 'nullable',
            'year' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
            'genre_id' => 'required',
        ]);
        
        $data['isbn'] = strip_tags($data['isbn']);
        $data['title'] = strip_tags($data['title']);
        $data['author'] = strip_tags($data['author']);
        $data['publisher'] = strip_tags($data['publisher']);
        $data['year'] = strip_tags($data['year']);
        $data['description'] = strip_tags($data['description']);
        $data['user_id'] = auth()->id();

        if($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);

            $data['cover_image'] = '/img/'.$imageName;
        }
        else {
            // If user doesn't upload file, sets default placeholder as cover
            $data['cover_image'] = '/img/default.png';
        }

        Book::create($data);
        
        return redirect('/dashboard/add-book');
    }

    public static function getBooks() {
        $books = Book::get();

        return $books;
    }
}
