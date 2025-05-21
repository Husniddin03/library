@extends('layouts.admin')

@section('content')
    <h1>Add Book</h1>
    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Bio</label>
            <textarea name="bio" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Pages</label>
            <input type="number" name="pages" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <select name="author_id" class="form-control" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="book_img" class="form-control">
        </div>

        <div class="mb-3">
            <label>Audio File</label>
            <input type="file" name="book_audio" class="form-control">
        </div>

        <div class="mb-3">
            <label>Audio Duration (HH:MM:SS)</label>
            <input type="text" name="audio_time" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
