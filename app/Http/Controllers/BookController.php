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

    public function editBook(Request $request, $id) {
        $book = \App\Models\Book::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'nullable',
            'year' => 'nullable|integer',
            'isbn' => 'nullable',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $book->title = strip_tags($data['title']);
        $book->author = strip_tags($data['author']);
        $book->publisher = strip_tags($data['publisher'] ?? '');
        $book->year = strip_tags($data['year'] ?? '');
        $book->isbn = strip_tags($data['isbn'] ?? '');
        $book->description = strip_tags($data['description'] ?? '');

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);

            $book->cover_image = '/img/'.$imageName;
        }

        $book->save();

        return redirect()->route('dashboard', ['el' => 'list-books'])->with('success', 'Libro aggiornato con successo!');
    }
}
