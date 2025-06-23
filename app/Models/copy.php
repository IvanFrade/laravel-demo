<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class copy extends Model
{
    protected $fillable = [
        'book_id',
        'condition',
        'available',
        'notes',
    ];
}
