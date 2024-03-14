<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'book_name',
        'user_id',
        'author',
        'genre',
        'date_publication',
        'condition',
    ];

    protected $hidden = [];

    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sentApplications()
    {
        return $this->hasMany(Application::class, 'sender_book_id');
    }

    public function receivedApplications()
    {
        return $this->hasMany(Application::class, 'recipient_book_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
