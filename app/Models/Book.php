<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'bio', 'pages', 'author_id'];

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
        return $this->hasMany(BookImg::class);
    }

    public function categories()
    {
        return $this->hasMany(BookCategory::class);
    }

    public function downloads()
    {
        return $this->hasOne(BookDownload::class);
    }
}
