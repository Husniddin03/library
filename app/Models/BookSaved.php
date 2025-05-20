<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookSaved extends Model
{
    protected $table = 'book_saved';

    protected $fillable = ['user_id', 'book_id'];

    public $timestamps = false;
}

