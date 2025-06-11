@extends('layouts.user')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">

                    <h2 class="mb-0">Contact Page</h2>
                </div>

            </div>
        </div>
    </header>


    <section class="section-padding" id="section_2">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-5 col-12 pe-lg-5">
                    <div class="contact-info">
                        <h3 class="mb-4">We love to help you. Get in touch</h3>

                        <p class="d-flex border-bottom pb-3 mb-4">
                            <strong class="d-inline me-4">Phone:</strong>
                            <span>+998 (77) 025 26 77 </span>
                            <span> +998 (93) 129 13 12</span>
                        </p>

                        <p class="d-flex border-bottom pb-3 mb-4">
                            <strong class="d-inline me-4">Email:</strong>
                            <a href="mailto:husniddin13124041@gmail.com">husniddin13124041@gmail.com </a>
                            <a href="mailto:husniddin12134041@gmail.com"> husniddin12134041@gmail.com</a>
                        </p>

                        <p class="d-flex">
                            <strong class="d-inline me-4">Location:</strong>
                            <span>Samarkand Branch of Tashkent University of Information Technologies, Samarkand,
                                Uzbekistan</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                    <iframe class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3054.03208800916!2d67.00201517296948!3d39.658686387295425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f4d18d1b7cb6777%3A0xee8a5f918bec807b!2sToshkent%20Axborot%20Texnologiyalari%20Universiteti%20Samarqand%20Filiali%20Kompyuter%20injiniringi%20fakulteti!5e0!3m2!1suz!2s!4v1748089435181!5m2!1suz!2s"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    </main>
@endsection
