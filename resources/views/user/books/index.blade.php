@extends('layouts.user')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">

                    <h2 class="mb-0">Books Page</h2>
                </div>

            </div>
        </div>
    </header>


    <section class="latest-podcast-section section-padding" id="section_2">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">All books</h4>
                    </div>
                </div>

                @foreach ($books as $book)

                <div class="col-lg-6 col-12 mb-4 mt-4 mb-lg-0">
                    <div class="custom-block d-flex">
                        <div class="">
                            <div class="custom-block-icon-wrap">
                                <div class="section-overlay"></div>
                                <a href="detail-page.html" class="custom-block-image-wrap">
                                    <img src="{{ asset('storage/'. $book->images->book_img) }}" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="mt-2">
                                <a href="#" class="btn custom-btn">
                                    Live Read
                                </a>
                            </div>
                        </div>

                        <div class="custom-block-info">
                            <div class="custom-block-top d-flex mb-1">
                                <small class="me-4">
                                    <i class="bi-clock-fill custom-icon"></i>
                                    {{ $book->created_at }}
                                </small>

                                <small>Pages <span class="badge">{{ $book->pages }}</span></small>
                            </div>

                            <h5 class="mb-2">
                                <a href="/books/{{ $book->id }}">
                                    {{ $book->name }}
                                </a>
                            </h5>

                            <div class="profile-block d-flex">
                                <img src="{{ asset('storage/' . $book->author->authorImg->author_img) }}"
                                    class="profile-block-image img-fluid" alt="">

                                <p>
                                    {{ $book->author->name }}
                                    <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                    <strong>{{ $book->category->book_category }}</strong>
                                </p>
                            </div>

                            <p class="mb-0">{{ substr($book->bio, 0, 80) }}...</p>

                            <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                <a href="#" class="bi-headphones me-1">
                                    <span>{{ $book->audio ? count($book->audio) : '0:0' }}</span>
                                </a>

                                <form action="{{ route('books.like', $book->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @if($book->likes->where('user_id', auth()->id())->count())
                                        <button type="submit" formaction="{{ route('books.unlike', $book->id) }}" class="btn p-0 border-0 bg-transparent bi-heart-fill text-danger me-1"></button>
                                    @else
                                        <button type="submit" class="btn p-0 border-0 bg-transparent bi-heart me-1"></button>
                                    @endif
                                    <span>{{ $book->likes ? count($book->likes) : 0 }}</span>
                                </form>

                                <a href="/books/{{ $book->id }}#comments" class="bi-chat me-1">
                                    <span>{{ $book->comments ? count($book->comments) : 0 }}</span>
                                </a>

                                <a href="{{ route('books.download', $book->id) }}" class="bi-download">
                                    <span>{{ $book->downloads ? $book->downloads->count : 0 }}</span>
                                </a>

                            </div>
                        </div>

                        <div class="d-flex flex-column ms-auto">
                            <a href="#" class="badge ms-auto">
                                <i class="bi-heart"></i>
                            </a>

                            <a href="#" class="badge ms-auto">
                                <i class="bi-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach



            </div>
            <div class="col-lg-4 mt-4 mx-auto">
                <nav aria-label="Page navigation example">
                    {{ $books->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </section>


    </main>
@endsection
