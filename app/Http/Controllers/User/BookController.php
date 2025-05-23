<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(6);
        $books->load('author', 'images', 'audio', 'category');
        return view('user.books.index', compact('books'));
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        $book->load('author', 'images', 'audio', 'category', 'comments');
        return view('user.books.show', compact('book'));
    }

    public function comment(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);
        return redirect()->back();
    }

    public function like(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->likes()->create([
            'user_id' => auth()->id(),
        ]);
        return redirect()->back();
    }

    public function unlike(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->likes()->where('user_id', auth()->id())->delete();
        return redirect()->back();
    }

    public function download($id)
    {
        $book = Book::with('author')->findOrFail($id);
        $existing = DB::table('book_download')->where('book_id', $book->id)->first();

        if ($existing) {
            DB::table('book_download')
                ->where('book_id', $book->id)
                ->update([
                    'count' => $existing->count + 1
                ]);
        } else {
            DB::table('book_download')->insert([
                'book_id' => $book->id,
                'count' => 1
            ]);
        }

        $filePath = storage_path('app/public/' . $book->path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        $authorName = $book->author ? $book->author->name : 'Unknown Author';
        $filename = $authorName . ' - ' . $book->name . '.' . pathinfo($book->path, PATHINFO_EXTENSION);

        return response()->download($filePath, $filename);
    }

}
