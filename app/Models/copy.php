<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'book_id',
        'condition',
        'available',
        'notes',
    ];
}
