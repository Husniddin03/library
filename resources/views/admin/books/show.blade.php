@extends('layouts.admin')

@section('content')
    <h1>{{ $book->name }}</h1>
    <p><strong>Author:</strong> {{ $book->author->name }}</p>
    <p><strong>Bio:</strong> {{ $book->bio }}</p>
    <p><strong>Pages:</strong> {{ $book->pages }}</p>

    @if ($book->bookImg)
        <img src="{{ asset('storage/' . $book->images->book_img) }}" width="200">
    @endif

    @if ($book->bookAudio)
        <h5 class="mt-3">Audio</h5>
        <audio controls>
            <source src="{{ asset('storage/' . $book->audio->book_audio) }}">
        </audio>
        <p>Duration: {{ $book->bookAudio->audio_time }}</p>
    @endif
@endsection
