@extends('layouts.admin')

@section('content')
    <h1>Books List</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">Add Book</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Image</th>
                <th>Audio</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>
                        @if ($book->images)
                            <img src="{{ asset('storage/' . $book->images->book_img) }}" width="70">
                        @endif
                    </td>
                    <td>
                        @if ($book->bookAudio)
                            <audio controls>
                                <source src="{{ asset('storage/' . $book->audio->book_audio) }}">
                            </audio>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.books.show', $book) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
