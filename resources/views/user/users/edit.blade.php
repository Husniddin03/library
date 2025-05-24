@extends('layouts.user')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Edit User: {{ $user->name }}</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="contact-section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" class="custom-form contact-form"
                        role="form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $user->name) }}" placeholder="Full Name" required>
                                    <label for="name">Full Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" placeholder="Email address" required>
                                    <label for="email">Email address</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="New Password (leave blank to keep current)">
                                    <label for="password">New Password</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Confirm New Password">
                                    <label for="password_confirmation">Confirm New Password</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 ms-auto">
                                <button type="submit" class="form-control">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
