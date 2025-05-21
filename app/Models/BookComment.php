<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookComment extends Model
{
    protected $table = 'books_comment';

    protected $fillable = ['user_id', 'book_id', 'comment'];

    public $timestamps = false;
    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
