<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_book_id',
        'recipient_book_id',
        'sender_user_id',
        'recipient_user_id',
        'data_application',
        'status',
        'message'
    ];

    protected $hidden = [];

    protected $casts = [];
}
