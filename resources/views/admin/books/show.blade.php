@extends('layouts.admin')

@section('content')
    <h1>{{ $book->name }}</h1>
    <p><strong>Author:</strong> {{ $book->author->name }}</p>
    <p><strong>Bio:</strong> {{ $book->bio }}</p>
    <p><strong>Pages:</strong> {{ $book->pages }}</p>
    <p><strong>Category:</strong> {{ $book->category->book_category }}</p>
    <p><strong>Likes:</strong> {{ count($book->likes) }}</p>
    <p><strong>Comments:</strong> {{ count($book->comments) }}</p>
    <p><strong>Saved:</strong> {{ count($book->savedBooks) }}</p>
    <p><strong>Download:</strong> {{ count($book->downloads) }}</p>

    @if ($book->images)
        <img src="{{ asset('storage/' . $book->images->book_img) }}" width="200">
    @endif

    @if ($book->audio)
        <h5 class="mt-3">Audio</h5>
        <audio controls>
            <source src="{{ asset('storage/' . $book->audio->book_audio) }}">
        </audio>
        <p>Duration: {{ $book->audio->audio_time }}</p>
    @endif
@endsection
