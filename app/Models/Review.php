<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'recipient_id',
        'grade',
        'comment',
        'data_review'
    ];

    protected $hidden = [];

    protected $casts = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
