<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookDownload extends Model
{
    protected $table = 'book_download';

    protected $fillable = ['book_id', 'count'];

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
