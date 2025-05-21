<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAudio extends Model
{
    protected $table = 'book_audio';

    protected $fillable = ['book_id', 'book_audio', 'audio_time'];

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
