@extends('layout.layout')

@section('title', 'register')

@section('content')


<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-7">  
            <h4 class="card-header">REGISTER</h4>
            <div class="card-body">
                <form>
                    <div class="row align-items-center g-3 pt-3">
                        <div class="col">
                            <label class="mb-2" for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Input Your Name Here">
                        </div>
                        <div class="col">
                            <label class="mb-2" for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Input Your Username Here">
                        </div>
                    </div>

                    <div class="row align-items-center g-3 pt-3">
                        <div class="col">
                            <label class="mb-2" for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Input Your Email Here">
                        </div>
                        <div class="col">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text rounded-left">IDR</span>
                            </div> -->
                            <label class="mb-2" for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Input Your Phone Number Here">
                        </div>
                    </div>

                    <div class="row align-items-center g-3 pt-3">
                        <div class="col">
                            <label class="mb-2" for="password">Password</label>
                            <input name="password" class="form-control" id="id_password" placeholder="Input Your Password Here">
                                <!-- <i class="far fa-eye" id="togglePassword"></i> -->
                        </div>
                        <div class="col">
                            <label class="mb-2" for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob">
                        </div>
                    </div>

                    <div class="row g-3 pt-3">
                        <div class="col">
                            <label class="mb-2" for="inputEmail" type="password">Confirm Password</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Re-type Your Password">
                        </div>
                        <div class="col">
                            <div>
                                <label class="mb-2 align-items-center"> Gender </label>
                            </div>
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male"> Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                        </div>
                    </div>

                    <div class="form-group mb-3 pt-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="d-grid mx-auto pt-3">
                        <button type="submit" class="btn btn-dark btn-block">REGISTER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
</script>

@endsection