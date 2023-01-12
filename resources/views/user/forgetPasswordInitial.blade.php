@extends('layout.layout')

@section('title', 'Forget Password')

@section('content')

<section class="forget_password">
    <div class="container d-flex flex-column" style="height:90vh;">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-12 col-md-8 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h2 class="orange card-header text-center">PASSWORD RESET</h2>
                            <p class="orange text-center mb-2 mt-5">Enter your email address that you used to register.  We'll send you an authentication number to reset your password</p>
                        </div>
                        <form method="POST" action="/forget-password">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="orange form-label">Email</label>
                                <input type="email" id="email" class="orange form-control" name="email" required="">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">ENTER </button>
                            </div>
                            <span class="orange">Don't have an account? <a class ="orange link-hover-register" href="/register">sign in</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
