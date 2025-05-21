<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'path', 'bio', 'pages', 'author_id'];

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function likes()
    {
        return $this->hasMany(BookLike::class);
    }

    public function comments()
    {
        return $this->hasMany(BookComment::class);
    }

    public function audio()
    {
        return $this->hasOne(BookAudio::class);
    }

    public function savedBooks()
    {
        return $this->hasMany(BookSaved::class);
    }

    public function images()
    {
        return $this->hasOne(BookImg::class);
    }

    public function category()
    {
        return $this->hasOne(BookCategory::class);
    }

    public function downloads()
    {
        return $this->hasMany(BookDownload::class);
    }
}
