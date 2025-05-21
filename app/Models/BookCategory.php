<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = 'book_category';

    protected $fillable = ['book_id', 'book_category'];

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
