<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="kitoblar, o'qish, elektron kitob, vaqtni o'qish, onlayn kitoblar, o'qish vaqti, ta'lim, bilim, o'qish sayti">

    <title>Time To Read</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <link href="{{ asset('css/templatemo-pod-talk.css') }}" rel="stylesheet">

    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="/">
                    <img src="{{ asset('images/logo.png') }}" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>

                <div class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search"
                            placeholder="Search Book" aria-label="Search">
                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                    <div id="searchResult" class="list-group mt-1"></div>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a id="home" class="nav-link" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a id="about" class="nav-link" href="{{ route('user.about') }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a id="contact" class="nav-link" href="{{ route('user.contact') }}">Contact</a>
                        </li>
                    </ul>


                    @if (auth()->check())
                        <div class="ms-4">
                            <a href="{{ route('books.saved', auth()->user()->id) }}"
                                class="btn custom-btn custom-border-btn smoothscroll">
                                <i class="bi-bookmark-fill"></i>
                            </a>
                        </div>

                        <div class="ms-4">
                            <a href="{{ route('users.edit', auth()->user()->id) }}"
                                class="btn custom-btn custom-border-btn smoothscroll">{{ auth()->user()->name }}</a>
                        </div>
                    @else
                        <div class="ms-4">
                            <a href="/users/create" class="btn custom-btn custom-border-btn smoothscroll">Get
                                started</a>
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                        <h6 class="site-footer-title mb-3">Contact</h6>

                        <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> <span> <br>+998 (77) 025 26 77
                                <br> +998 (93) 129 13 12</span></p>

                        <p>
                            <strong class="d-inline me-2">Email:</strong>
                            <a href="mailto:husniddin13124041@gmail.com">husniddin13124041@gmail.com</a>
                            <a href="mailto:husniddin12134041@gmail.com">husniddin12134041@gmail.com</a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <h6 class="site-footer-title mb-3">Download Mobile</h6>

                        <div class="site-footer-thumb mb-4 pb-2">
                            <div class="d-flex flex-wrap">There is no mobile app yet, but it is planned to be developed
                                in the future. </div>
                        </div>

                        <h6 class="site-footer-title mb-3">Social</h6>

                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="https://t.me/Hmatritsa" class="social-icon-link bi-telegram"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="container pt-5">
                <div class="row align-items-center">

                    <div class="col-lg-2 col-md-3 col-12">
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('images/logo.png') }}" class="logo-image img-fluid"
                                alt="templatemo pod talk">
                        </a>
                    </div>

                    <div class="col-lg-7 col-md-9 col-12">
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="/" class="site-footer-link">Home</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="{{ route('user.about') }}" class="site-footer-link">About</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="{{ route('user.contact') }}" class="site-footer-link">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>


        <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <script>
            let path = window.location.pathname.split("/").filter(Boolean).pop();

            let activeLink = document.getElementById(path);
            if (activeLink) {
                activeLink.classList.add("active");
            } else if (path == null) {
                document.getElementById('home').classList.add("active");
            }

            const searchInput = document.getElementById('search');
            const resultDiv = document.getElementById('searchResult');

            searchInput.addEventListener('keyup', function() {
                const query = this.value;
                if (query.length === 0) {
                    resultDiv.innerHTML = '';
                    return;
                }

                fetch(`/books/search/${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        let html = '';
                        if (data.length > 0) {
                            data.forEach(book => {
                                html +=
                                    `<a href="/books/${book.id}" class="list-group-item list-group-item-action">${book.name}</a>`;
                            });
                        } else {
                            html = '<div class="list-group-item">No results found</div>';
                        }
                        resultDiv.innerHTML = html;
                    });
            });
        </script>

</body>

</html>
