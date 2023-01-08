@extends('layout.layout')

@section('title', 'login')

@section('content')

    <section class="auth">
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 justify-content-center pt-3" style="display: flex">
                    <div class="card card-login" style="height: auto; width: 35rem;">
                        <h2 class="header-form orange card-header">LOGIN</h4>
                            <div class="card-body">
                                <form method="POST" action="/login">
                                    @csrf
                                    <div class="col pb-3">
                                        <label class="label-form orange mb-2" for="inputEmail"
                                            style="padding-left: 0.3rem">Email</label>
                                        <input name="email" type="text" class="orange form-control" id="inputEmail"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="col pb-3">
                                        <label class="label-form orange mb-2" for="inputPassword"
                                            style="padding-left: 0.3rem">Password</label>
                                        <div class="input-group ">
                                            <input name="password" class="orange form-control" id="id_password">
                                            <span class="input-group-icon input-group-text"><i class="far fa-eye"
                                                    id="togglePassword"></i> </span>
                                        </div>
                                    </div>
                                    <div class="row pb-3" style="padding: 0rem 1rem">
                                        <div class="col-6 col-md-6" style="padding-left: 0.1rem">
                                            <input class="orange checklist"name="remember" type="checkbox"
                                                value="lsRememberMe" id="rememberMe">
                                            <label class="orange" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="col-6 col-md-6"
                                            style="display: flex; justify-content: right; padding: 0px">
                                            <a class="orange link-hover-register" href="">Forgot password?</a>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger form-outline mb-4" role="alert">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif
                                    <div class="row pb-3" style="padding: 0rem 1rem">
                                        <button type="submit" class="btn btn-block">
                                            <h4 class="no-margin"> LOGIN </h4>
                                        </button>
                                    </div>
                                    <div class="row pb-3" style="padding: 0rem 1rem">
                                        <p class="orange" style="padding: 0rem 0rem">Don't have an account? <a
                                                class="orange link-hover-register" href="/register"> Register Here</a>.</p>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                <div
                    class="col-md-4 pt-3 d-none d-sm-flex align-items-center justify-content-center justify-content-lg-start">
                    <img src="image\login-asset1.png" class="img-fluid img-login" style="max-width: 50%; height: auto;"
                        alt="...">
                </div>
            </div>
        </div>
    </section>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

@endsection
