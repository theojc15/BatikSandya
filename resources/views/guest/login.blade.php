@extends('layout.layout')

@section('title', 'login')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 justify-content-center pt-3" style="display: flex">
                <div class="card card-login" style="height: auto; width: 35rem;">
                    <h2 class="header-form orange card-header">LOGIN</h4>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="row pb-3" style="padding: 0rem 1rem">
                                <label class="mb-2" for="inputEmail" style="padding-left: 0.3rem">Email</label>
                                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="row pb-3" style="padding: 0rem 1rem">
                                <label class="mb-2" for="inputPassword" style="padding-left: 0.3rem">Password</label>
                                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                            <div class="row pb-3" style="padding: 0rem 1rem">
                                <div class="col-6 col-md-6" style="padding-left: 0.1rem">
                                    <input name="remember" type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
                                </div>
                                <div class="col-6 col-md-6" style="display: flex; justify-content: right; padding: 0px">
                                    <a href="">Forgot password?</a>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger form-outline mb-4" role="alert">
                                    {{$errors->first()}}
                                </div>
                            @endif
                            <div class="row pb-3" style="padding: 0rem 1rem">
                                <button type="submit" class="btn btn-block"> <h4 class="no-margin"> LOGIN </h4></button>
                            </div>
                            <div class="row pb-3" style="padding: 0rem 1rem">
                                <p style="padding: 0rem 0rem">Don't have an account? <a href="/register"> Register Here</a>.</p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-3">
                <p>KOTAK KOTAK</p>
            </div>
        </div>
    </div>


@endsection
