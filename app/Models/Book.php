<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'user_id',
        'author',
        'genre',
        'date_publication',
        'condition'
    ];

    protected $hidden = [];

    protected $casts = [];

    public function orderBy()
    {

    }
}
