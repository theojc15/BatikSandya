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
                            <p class="orange text-center mb-2 mt-5">Enter your <b> new password </b></p>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="orange form-label">New Password</label>
                                <div class="input-group ">
                                    <input name="password" class="orange form-control" id="id_password">
                                    <span class="input-group-icon input-group-text"><i class="far fa-eye" id="togglePassword"></i> </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="orange form-label">Repeat New Password</label>
                                <div class="col">   
                                <div class="input-group">
                                    <input name="confpassword" class="orange form-control" id="conf_password">
                                        <span class="input-group-icon input-group-text"><i class="far fa-eye" id="toggleconfPassword"></i> </span>
                                </div>
                            </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">ENTER </button>
                            </div>
                        </form>
                    </div>
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