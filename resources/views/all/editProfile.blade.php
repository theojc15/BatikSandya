@extends('layout.layout')

@section('title', 'edit profile')

@section('content')
    <section class="edit-profile">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h4 class="card-header text-center mb-3">Edit Profile</h4>
                    <div class="card">
                        <div class="card-body">
                            <form style="all: unset !important">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Name </label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        value="{{ Auth::user()->name }}">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Username </label>
                                    <input name="username" type="text" class="form-control" id="username"
                                        value="{{ Auth::user()->username }}">

                                </div>
                                <div class="form-group mb-3">
                                    <div>
                                        <label class="mb-2"> Gender </label>
                                    </div>
                                    <input class="orange radio-button" type="radio" id="male" name="gender"
                                        value="male" {{ old('gender') == 'male' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                    <label class="orange" for="male"> Male</label>
                                    <input class="orange radio-button" type="radio" id="female" name="gender"
                                        value="female"
                                        {{ old('gender') == 'female' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                    <label class="orange" for="female">Female</label>

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Date of Birth </label>
                                    <input name="date_of_birth" type="date" class="form-control" id="dob"
                                        value="{{ Auth::user()->DOB }}" placeholder="">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Phone Number </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-left">+62</span>
                                        </div>
                                        <input name="phone" type="text" class="form-control" id="phone"
                                            value="{{ Auth::user()->phone }}">
                                    </div>

                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Address </label>
                                    <textarea name="address" class="form-control" id="address" rows="3">{{ Auth::user()->address }}</textarea>

                                </div>
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
