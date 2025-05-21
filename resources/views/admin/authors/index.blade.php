{{-- resources/views/admin/authors/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Authors List</h2>

    <a href="{{ route('admin.authors.create') }}" class="btn btn-success mb-3">+ Add Author</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Bio</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($author->authorImg)
                            <img src="{{ asset('storage/' . $author->authorImg->author_img) }}" width="60" height="60" class="rounded">
                        @else
                            <span>No image</span>
                        @endif
                    </td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->bio }}</td>
                    <td>
                        <a href="{{ route('admin.authors.show', $author->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this author?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
