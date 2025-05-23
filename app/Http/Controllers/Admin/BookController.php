<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\BookImg;
use App\Models\BookAudio;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'images', 'audio', 'category'])->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin.books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'book_file' => 'required|file',
            'bio' => 'required',
            'pages' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
            'book_img' => 'nullable|image|max:500000',
            'book_audio' => 'nullable|mimes:mp3,wav,m4a|max:500000',
            'audio_time' => 'nullable|date_format:H:i:s',
        ]);

        if ($request->hasFile('book_file')){
            $path = $request->file('book_file')->store('books/files', 'public');
            $book = Book::create([
                'name' => $request->name,
                'bio' => $request->bio,
                'path' => $path,
                'pages' => $request->pages,
                'author_id' => $request->author_id,
            ]);
        }

        BookCategory::create([
            'book_id' => $book->id,
            'book_category' => $request->category,
        ]);

        // Save image
        if ($request->hasFile('book_img')) {
            $path = $request->file('book_img')->store('books/images', 'public');
            BookImg::create([
                'book_id' => $book->id,
                'book_img' => $path,
            ]);
        }

        // Save audio
        if ($request->hasFile('book_audio')) {
            $audioPath = $request->file('book_audio')->store('books/audios', 'public');
            BookAudio::create([
                'book_id' => $book->id,
                'book_audio' => $audioPath,
                'audio_time' => $request->audio_time,
            ]);
        }

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        $book->load(['author', 'images', 'audio', 'category', 'likes', 'comments', 'savedBooks', 'downloads']);
        return view('admin.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $book->load(['images', 'audio']);
        return view('admin.books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'pages' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
            'book_img' => 'nullable|image|max:500000',
            'book_audio' => 'nullable|mimes:mp3,wav,m4a|max:500000',
            'audio_time' => 'nullable|date_format:H:i:s',
        ]);

        $book->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'pages' => $request->pages,
            'author_id' => $request->author_id,
        ]);

        // Update or add image
        if ($request->hasFile('book_img')) {
            $path = $request->file('book_img')->store('books/images', 'public');
            if ($book->images) {
                Storage::disk('public')->delete($book->images->book_img);
                $book->images->update(['book_img' => $path]);
            } else {
                BookImg::create(['book_id' => $book->id, 'book_img' => $path]);
            }
        }

        // Update or add audio
        if ($request->hasFile('book_audio')) {
            $audioPath = $request->file('book_audio')->store('books/audios', 'public');
            if ($book->audio) {
                Storage::disk('public')->delete($book->audio->book_audio);
                $book->audio->update([
                    'book_audio' => $audioPath,
                    'audio_time' => $request->audio_time,
                ]);
            } else {
                BookAudio::create([
                    'book_id' => $book->id,
                    'book_audio' => $audioPath,
                    'audio_time' => $request->audio_time,
                ]);
            }
        }

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        if ($book->images) {
            Storage::disk('public')->delete($book->images->book_img);
            $book->images->delete();
        }

        if ($book->audio) {
            Storage::disk('public')->delete($book->audio->book_audio);
            $book->audio->delete();
        }

        if ($book->path) {
            Storage::disk('public')->delete($book->path);
        }

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted.');
    }
}
