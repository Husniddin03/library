<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorImg extends Model
{
    protected $table = 'author_img';

    protected $fillable = ['author_id', 'author_img'];

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
