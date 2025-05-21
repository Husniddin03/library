{{-- resources/views/admin/authors/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Author Details</h2>

    <div class="card mb-3" style="max-width: 600px;">
        <div class="row g-0">
            @if($img)
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $img) }}" class="img-fluid rounded-start" alt="{{ $author->name }}">
                </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $author->name }}</h5>
                    <p class="card-text">{{ $author->bio }}</p>
                    <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
