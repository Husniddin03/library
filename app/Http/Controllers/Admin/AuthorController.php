<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\AuthorImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'author_img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $author = Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);

        // Agar rasm bo‘lsa
        if ($request->hasFile('author_img')) {
            $path = $request->file('author_img')->store('author_images', 'public');

            AuthorImg::create([
                'author_id' => $author->id,
                'author_img' => $path,
            ]);
        }

        return redirect()->route('admin.authors.index')->with('success', 'Author created');
    }

    public function show(Author $author)
    {
        $img = $author->authorImg->author_img ?? null;
        return view('admin.authors.show', compact('author', 'img'));
    }

    public function edit(Author $author)
    {
        $img = $author->authorImg->author_img ?? null;
        return view('admin.authors.edit', compact('author', 'img'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'author_img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $author->update([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);

        if ($request->hasFile('author_img')) {
            // Eski rasmni o‘chirish
            if ($author->authorImg) {
                Storage::disk('public')->delete($author->authorImg->author_img);
                $author->authorImg->delete();
            }

            $path = $request->file('author_img')->store('author_images', 'public');

            AuthorImg::create([
                'author_id' => $author->id,
                'author_img' => $path,
            ]);
        }

        return redirect()->route('admin.authors.index')->with('success', 'Author updated');
    }

    public function destroy(Author $author)
    {
        // Rasmlar o‘chiriladi
        if ($author->authorImg) {
            Storage::disk('public')->delete($author->authorImg->author_img);
            $author->authorImg->delete();
        }

        $author->delete();

        return redirect()->route('admin.authors.index')->with('success', 'Author deleted');
    }
}
