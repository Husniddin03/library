<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'bio'];

    public $timestamps = false;

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // app/Models/Author.php

    public function authorImg()
    {
        return $this->hasOne(\App\Models\AuthorImg::class);
    }

}
