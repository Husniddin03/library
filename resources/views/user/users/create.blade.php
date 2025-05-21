@extends('layouts.user')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">

                    <h2 class="mb-0">Registration Page</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="contact-section section-padding pt-0">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <div class="section-title-wrap mb-5">
                        <h4 id="reg" style="cursor: pointer" onclick="form(0)" class="section-title bg-primary">
                            Register</h4>
                        <h4 id="log" style="cursor: pointer" onclick="form(1)" class="section-title">Login</h4>
                    </div>

                    <form id="register" action="#" method="post" class="custom-form contact-form" role="form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="full-name" id="full-name" class="form-control"
                                        placeholder="Full Name" required="">

                                    <label for="floatingInput">Full Name</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="Email address" required="">

                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Name" required="">

                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="form-control" placeholder="Name" required="">

                                    <label for="confirm_password">Confirm Password</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 ms-auto">
                                <button type="submit" class="form-control">Submit</button>
                            </div>

                        </div>
                    </form>

                    <form hidden id="login" action="#" method="post" class="custom-form contact-form"
                        role="form">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="Email address" required="">

                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Name" required="">

                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 ms-auto">
                                <button type="submit" class="form-control">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection


<script>
    function form(id) {
        if (id) {
            document.getElementById('register').hidden = true;
            document.getElementById('login').hidden = false;

            document.getElementById('reg').classList.remove('bg-primary');
            document.getElementById('log').classList.add('bg-primary');
        } else {
            document.getElementById('register').hidden = false;
            document.getElementById('login').hidden = true;

            document.getElementById('log').classList.remove('bg-primary');
            document.getElementById('reg').classList.add('bg-primary'); // fixed: was 'add'
        }
    }
</script>
