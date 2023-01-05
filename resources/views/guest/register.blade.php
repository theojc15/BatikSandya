@extends('layout.layout')

@section('title', 'register')

@section('content')

<div class="signup-form">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header text-center">Register</h4>
                    <div class="card-body">
                        <form>
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <label class="mb-2" for="inputEmail">Name</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="col-auto">
                                    <label class="mb-2" for="inputPassword">Username</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>

                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <label class="mb-2" for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="col-auto">
                                    <label class="mb-2" for="inputPassword">Number Phone</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>

                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <label class="mb-2" for="inputEmail">Password</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="col-auto">
                                    <label class="mb-2" for="inputPassword">Date of Birth</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>

                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <label class="mb-2" for="inputEmail">Confirm Password</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection