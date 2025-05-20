<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Kitoblarni yoqtirgan foydalanuvchi
    public function booksLiked()
    {
        return $this->hasMany(BookLike::class);
    }

    // Kitoblarni saqlab qo‘ygan foydalanuvchi
    public function booksSaved()
    {
        return $this->hasMany(BookSaved::class);
    }

    // Kitoblarga komment qoldirgan foydalanuvchi
    public function booksCommented()
    {
        return $this->hasMany(BookComment::class);
    }
}
