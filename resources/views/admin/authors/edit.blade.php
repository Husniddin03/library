{{-- resources/views/admin/authors/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Author</h2>

    <form action="{{ route('admin.authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Author Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $author->name) }}">
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Biography</label>
            <textarea class="form-control" id="bio" name="bio" rows="5" required>{{ old('bio', $author->bio) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="author_img" class="form-label">Author Image</label>
            <input type="file" class="form-control" id="author_img" name="author_img" accept="image/*">
            @if($img)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $img) }}" width="100">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Author</button>
        <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
