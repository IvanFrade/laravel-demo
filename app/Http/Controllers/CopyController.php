<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function addBook($request) {
        $data = $request->validate([
            'book-id' => 'required',
            'condition' => 'required',
            'available' => 'required',
            'notes' => 'nullable',
        ]);

        $data['book-id'] = strip_tags($data['book-id']);
        $data['condition'] = strip_tags($data['condition']);
        $data['available'] = strip_tags($data['available']);
        $data['notes'] = strip_tags($data['notes']);

        Copy::create($data);
        
        return redirect('/');
    }
}
