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
                                    <img src="{{ asset('storage/'. $book->images->book_img) }}"
                                        class="custom-block-image img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12">
                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        <a href="#">
                                            <i class="bi-play"></i>
                                            Audio Play now
                                        </a>
                                    </small>

                                    <small>
                                        <i class="bi-clock-fill custom-icon"></i>
                                        {{ $book->audio ? $book->audio->audio_time: '00:00' }}
                                    </small>

                                    <small class="ms-auto">Pages <span class="badge"> {{ $book->pages }} </span></small>
                                </div>

                                <h2 class="mb-2">{{ $book->name }}</h2>

                                <p>{{ $book->bio }}</p>

                                <div class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5">
                                    <div class="d-flex mb-3 mb-lg-0 mb-md-0">
                                        <img src="{{ asset('storage/'. $book->author->authorImg->author_img) }}"
                                            class="profile-block-image img-fluid" alt="">

                                        <p>
                                            {{ $book->author->name }}
                                            <img src="{{ asset('images/verified.png') }}" class="verified-image img-fluid"
                                                alt="">
                                            <strong>{{$book->category->book_category}}</strong>
                                        </p>
                                    </div>

                                    <ul class="social-icon ms-lg-auto ms-md-auto">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-book"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-info-circle"></a>
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

                @if($book->comments->isEmpty())
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
