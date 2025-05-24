@extends('layouts.user')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">

                    <h2 class="mb-0">Time To Read</h2>
                </div>

            </div>
        </div>
    </header>


    <section class="latest-podcast-section section-padding pb-0" id="section_2">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-10 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">This Book</h4>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="custom-block-icon-wrap">
                                <div class="custom-block-image-wrap custom-block-image-detail-page">
                                    <img src="{{ asset('storage/' . $book->images->book_img) }}"
                                        class="custom-block-image img-fluid" alt="">
                                </div>
                                <div class="mt-2 col-12">
                                    <a style="width: 100%" href="{{ asset('storage/' . $book->path) }}"
                                        class="btn custom-btn">
                                        Live Read
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12">
                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <div class="custom-block1 col-4">
                                        <a href="#" class="bi-headphones me-1 mx-2"
                                            onclick="event.preventDefault(); playAudio('{{ asset('storage/' . ($book->audio->book_audio ?? '')) }}', this);">
                                            <span>{{ $book->audio ? $book->audio->audio_time : '0:0' }}</span>
                                        </a>

                                        <div class="audio-player-view mt-2" style="display:none;">
                                            <audio controls style="width: 100%;">
                                                @if ($book->audio && $book->audio->book_audio)
                                                    <source src="{{ asset('storage/' . $book->audio->book_audio) }}"
                                                        type="audio/mpeg">
                                                @endif
                                                Your browser does not support the audio element.
                                            </audio>
                                        </div>

                                        <script>
                                            function playAudio(src, trigger) {
                                                const playerView = trigger.closest('.custom-block1').querySelector('.audio-player-view');
                                                const audio = playerView.querySelector('audio');

                                                // Stop other audio players
                                                document.querySelectorAll('.audio-player-view').forEach(view => {
                                                    const a = view.querySelector('audio');
                                                    if (a && a !== audio) {
                                                        a.pause();
                                                        view.style.display = 'none';
                                                    }
                                                });

                                                if (audio.src !== src) {
                                                    audio.src = src;
                                                }

                                                if (audio.paused) {
                                                    audio.play();
                                                    playerView.style.display = 'block';
                                                } else {
                                                    audio.pause();
                                                    playerView.style.display = 'none';
                                                }
                                            }
                                        </script>
                                    </div>

                                    <small>
                                        <i class="bi-clock-fill custom-icon"></i>
                                        {{ $book->created_at ? $book->created_at->diffForHumans() : '' }}
                                    </small>

                                    <a href="{{ route('books.download', $book->id) }}" class="ms-auto bi-download">
                                        <span>{{ $book->downloads ? $book->downloads->count : 0 }}</span>
                                    </a>

                                    <div class="d-flex flex-column ms-auto">
                                        <form action="{{ route('books.save', $book->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @if ($book->savedBooks->where('user_id', auth()->id())->count())
                                                <button type="submit" formaction="{{ route('books.unsave', $book->id) }}"
                                                    class="badge ms-auto bg-primary border-0">
                                                    <i class="bi-bookmark-fill"></i>
                                                </button>
                                            @else
                                                <button type="submit" class="badge ms-auto border-0">
                                                    <i class="bi-bookmark"></i>
                                                </button>
                                            @endif
                                        </form>
                                    </div>

                                    <form class="ms-auto" action="{{ route('books.like', $book->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @if ($book->likes->where('user_id', auth()->id())->count())
                                            <button type="submit" formaction="{{ route('books.unlike', $book->id) }}"
                                                class="btn p-0 border-0 bg-transparent bi-heart-fill text-danger me-1"></button>
                                        @else
                                            <button type="submit"
                                                class="btn p-0 border-0 bg-transparent bi-heart me-1"></button>
                                        @endif
                                        <span>{{ $book->likes ? count($book->likes) : 0 }}</span>
                                    </form>

                                    <small class="ms-auto">Pages <span class="badge"> {{ $book->pages }} </span></small>
                                </div>

                                <h2 class="mb-2">{{ $book->name }}</h2>

                                <p>{{ $book->bio }}</p>

                                <div class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5">
                                    <div class="d-flex mb-3 mb-lg-0 mb-md-0">
                                        <img src="{{ asset('storage/' . $book->author->authorImg->author_img) }}"
                                            class="profile-block-image img-fluid" alt="">

                                        <p>
                                            {{ $book->author->name }}
                                            <img src="{{ asset('images/verified.png') }}" class="verified-image img-fluid"
                                                alt="">
                                            <strong>{{ $book->category->book_category }}</strong>
                                        </p>
                                    </div>

                                    <ul class="social-icon ms-lg-auto ms-md-auto">
                                        <li class="social-icon-item">
                                            <a href="{{ route('books.author', $book->author->id) }}#authorbooks"
                                                class="social-icon-link bi-book"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="{{ route('books.author', $book->author->id) }}#authorinfo"
                                                class="social-icon-link bi-info-circle"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section id="comments" class="related-podcast-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Comments</h4>
                    </div>
                </div>

                @auth
                    <div class="col-lg-12 col-12 mb-4">
                        <form action="{{ route('books.comment', $book->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="comment" class="form-label">Add a comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    </div>
                @else
                    <div class="col-lg-12 col-12 mb-4">
                        <p>
                            <a href="{{ route('users.create') }}">Log in</a> to add a comment.
                        </p>
                    </div>
                @endauth

                @if ($book->comments->isEmpty())
                    <div class="col-lg-12 col-12">
                        <p>No comments yet.</p>
                    </div>
                @else
                    @foreach ($book->comments as $comment)
                        <div class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-1">
                            <div class="d-flex mb-3 mb-lg-0 mb-md-0">
                                <p>
                                    {{ $comment->user->name }}
                                    <strong>{{ $comment->comment }}</strong>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif



            </div>
        </div>
    </section>
    </main>
@endsection
