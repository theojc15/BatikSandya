@extends('layout.layout')

@section('title', 'edit profile')

@section('content')
    <section class="edit-profile">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4 edit-profile-container">
                    <h4 class="card-header text-center mb-3">Edit Profile</h4>
                    <div class="card">
                        <div class="card-body">
                            <form style="all: unset !important" method="POST" action="edit-profile/{{ Auth::user()->id }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Name </label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        value="{{ old('name', Auth::user()->name) }}">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Username </label>
                                    <input name="username" type="text" class="form-control" id="username"
                                        value="{{ old('username', Auth::user()->username) }}">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Email </label>
                                    <input name="email" type="email" class="form-control" id="email"
                                        value="{{ old('email', Auth::user()->email) }}">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Date of Birth </label>
                                    <input name="date_of_birth" type="date" class="form-control" id="dob"
                                        value="{{ old('date_of_birth', Auth::user()->DOB) }}" placeholder="">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Phone Number </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-left">+62</span>
                                        </div>
                                        <input name="phone" type="text" class="form-control" id="phone"
                                            value="{{ old('phone', Str::substr(Auth::user()->phone, 3)) }}">
                                    </div>

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Address </label>
                                    <textarea name="address" class="form-control" id="address" rows="3">{{ old('address', Auth::user()->address) }}</textarea>

                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger form-outline mb-4" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @endif
                                <div class="edit-profile-btn d-flex justify-content-center mt-4">
                                    <button type="submit">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
