@extends('layout.layout')

@section('title', 'profile')

@section('content')
    <section class="profile">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h4 class="card-header text-center mb-3">Profile</h4>
                    <div class="card">
                        <div class="card-body">

                            @csrf
                            <div class="form-group mb-3">
                                <label class="mb-2"> Name </label>
                                <div class="value-col">
                                    test name
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Username </label>
                                <div class="value-col">
                                    test username
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Email </label>
                                <div class="value-col">
                                    test email
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Gender </label>
                                <div class="value-col">
                                    test gender
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Date of Birth </label>
                                <div class="value-col">
                                    test dob
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Phone Number </label>
                                <div class="value-col">
                                    test phone number
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Address </label>
                                <div class="value-col">
                                    test address
                                </div>

                            </div>
                            <div class="edit-profile-btn d-flex justify-content-center mt-4">
                                <button>EDIT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
