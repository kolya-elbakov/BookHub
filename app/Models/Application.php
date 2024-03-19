<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_user_id',
        'recipient_user_id',
        'sender_book_id',
        'recipient_book_id',
        'data_application',
        'status',
        'message'
    ];

    protected $hidden = [];

    protected $casts = [];

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }

    public function recipientUser()
    {
        return $this->belongsTo(User::class, 'recipient_user_id');
    }

    public function senderBook()
    {
        return $this->belongsTo(Book::class, 'sender_book_id');
    }

    public function recipientBook()
    {
        return $this->belongsTo(Book::class, 'recipient_book_id');
    }

    public function message()
    {
        return $this->belongsTo(Book::class, 'message');
    }
}
