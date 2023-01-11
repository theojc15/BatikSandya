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
                                    {{ Auth::user()->name }}
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Username </label>
                                <div class="value-col">
                                    {{ Auth::user()->username }}
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Email </label>
                                <div class="value-col">
                                    {{ Auth::user()->email }}
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Gender </label>
                                <div class="value-col">
                                    {{ Auth::user()->gender }}
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Date of Birth </label>
                                <div class="value-col">
                                    {{ Auth::user()->DOB }}
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Phone Number </label>
                                <div class="value-col">
                                    {{ Auth::user()->phone }}
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2"> Address </label>
                                <div class="value-col">
                                    {{ Auth::user()->address }}
                                </div>

                            </div>
                            <div class="edit-profile-btn d-flex justify-content-center mt-4">
                                <a style="text-decoration: none;width: 35%" href="/edit-profile"><button style="width: 100%">EDIT</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
