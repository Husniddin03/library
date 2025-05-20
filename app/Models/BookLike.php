<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookLike extends Model
{
    protected $table = 'books_like';

    protected $fillable = ['user_id', 'book_id'];

    public $timestamps = false;
}

