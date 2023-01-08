@extends('layout.layout')

@section('title', 'register')

@section('content')

<section class = "auth">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="header-form orange card-header">REGISTER</h2>
                <div class="card-body">
                    <form method="POST" action="/register">
                        @csrf
                        <div class="row align-items-center g-3 pt-3">
                            <div class="col">
                                <label class="label-form orange mb-2" for="name">Name</label>
                                <input name="name" type="text" class="orange form-control" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="col">
                                <label class="label-form orange mb-2" for="username">Username</label>
                                <input name="username" type="text" class="orange form-control" id="username" value="{{ old('username') }}">
                            </div>
                        </div>

                        <div class="row align-items-center g-3 pt-3">
                            <div class="col">
                                <label class="label-form orange mb-2" for="email">Email</label>
                                <input name="email" type="text" class="orange form-control" id="email" value="{{ old('email') }}">
                            </div>
                            <div class="col">
                                <label class="label-form orange mb-2" for="phone">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-phone input-group-text">+62</span>
                                    </div>
                                    <input name="phone" type="text" class="orange form-control" id="phone" value="{{ old('phone') }}" >
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center g-3 pt-3">
                            <div class="col">
                                <label class="label-form orange mb-2" for="password">Password</label>
                                <div class="input-group">
                                    <input name="password" class="orange form-control" id="id_password">
                                        <span class="input-group-icon input-group-text"><i class="far fa-eye" id="togglePassword"></i> </span>
                                </div>
                            </div>
                            <div class="col">
                                <label class="label-form orange mb-2" for="dob">Date of Birth</label>
                                <input name="date_of_birth" type="date" class="orange form-control" id="dob" value="{{old('date_of_birth')}}" placeholder="">
                            </div>
                        </div>

                        <div class="row g-3 pt-3">
                            <div class="col">
                                <label class="label-form orange mb-2" for="conf-password">Confirm Password</label>
                                <div class="input-group">
                                    <input name="confpassword" class="orange form-control" id="conf_password">
                                        <span class="input-group-icon input-group-text"><i class="far fa-eye" id="toggleconfPassword"></i> </span>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <label class="label-form orange mb-2 align-items-center"> Gender </label>
                                </div>
                                <input class = "orange radio-button" type="radio" id="male" name="gender" value="male" {{ old('gender')=="male" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class = "orange" for="male"> Male</label>
                                <input class = "orange radio-button" type = "radio" id="female" name="gender" value="female" {{ old('gender')=="female" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class = "orange" for="female">Female</label>
                            </div>
                        </div>

                        <div class="form-group label-form orange mb-3 pt-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" class="orange form-control" id="address" rows="3">{{old('address')}}</textarea>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger form-outline mb-4" role="alert">
                                {{$errors->first()}}
                            </div>
                        @endif
                        <div class="d-grid mx-auto pt-3">
                            <button type="submit" class="btn btn-block"><h4 class="no-margin">REGISTER</h4></button>
                        </div>
                        <div class="row pt-3" style="padding: 0rem 1rem">
                            <p class = "orange" style="padding: 0rem 0rem">Already have an account? <a class = "orange link-hover-register" href="/login"> Login Here</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    const toggleconfPassword = document.querySelector('#toggleconfPassword');
    const confpassword = document.querySelector('#conf_password');

    toggleconfPassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = confpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confpassword.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>

@endsection
