@extends('layouts.admin')

@section('content')
    <h1>Edit Book</h1>
    <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $book->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Bio</label>
            <textarea name="bio" class="form-control" required>{{ $book->bio }}</textarea>
        </div>

        <div class="mb-3">
            <label>Pages</label>
            <input type="number" name="pages" value="{{ $book->pages }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <select name="author_id" class="form-control" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" @if ($book->author_id == $author->id) selected @endif>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            @if ($book->bookImg)
                <img src="{{ asset('storage/' . $book->bookImg->book_img) }}" width="100">
            @endif
            <input type="file" name="book_img" class="form-control">
        </div>

        <div class="mb-3">
            <label>Audio File</label><br>
            @if ($book->bookAudio)
                <audio controls>
                    <source src="{{ asset('storage/' . $book->bookAudio->book_audio) }}">
                </audio>
            @endif
            <input type="file" name="book_audio" class="form-control">
        </div>

        <div class="mb-3">
            <label>Audio Duration</label>
            <input type="text" name="audio_time" value="{{ $book->bookAudio->audio_time ?? '' }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
