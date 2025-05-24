<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookImg extends Model
{
    protected $table = 'book_img';

    protected $fillable = ['book_id', 'book_img'];

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
