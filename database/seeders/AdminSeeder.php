<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Oldindan mavjud bo‘lmasligini tekshiradi
        if (!Admin::where('email', 'husniddin13124041@gmail.com')->exists()) {
            Admin::create([
                'name' => 'Husniddin',
                'email' => 'husniddin13124041@gmail.com',
                'password' => Hash::make('330440311'),
            ]);
        }
    }
}
