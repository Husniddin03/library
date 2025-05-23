<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function welcome()
    {
        $authors = Author::all();
        $books = Book::orderBy('id', 'desc')->take(2)->get();
        $groupedCategories = BookCategory::select('book_category', DB::raw('COUNT(*) as total'))
    ->groupBy('book_category')
    ->get();

        return view('user.welcome', compact('authors', 'books', 'groupedCategories'));
    }
    public function about()
    {
        return view('user.about');
    }
    public function contact()
    {
        return view('user.contact');
    }
}
