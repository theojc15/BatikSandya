@extends('layout.layout')

@section('title', 'profile')
@php
    $total = 0;
    for ($i = 0; $i < sizeof($carts); $i++) {
        $total += $carts[$i]->qty * $user->product[$i]->price;
    }
@endphp
@section('content')
    <section class="checkout">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h4 class="card-header text-center mb-3">Checkout</h4>
                    <div class="card">
                        <div class="card-body">

                            <form style="all: unset !important" method="POST" action="/purchase" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="mb-2"> Address </label>
                                    <input name="address" type="text" class="form-control" id="address" value="{{ $user->address }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="price" class="orange form-label">Total Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">IDR</span>
                                        </div>
                                        <input name="text" type="text" class="readonly form-control" id="address" value="Rp {{ $total }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2"> Payment Method </label>
                                    <input name="payment-method" type="text" class="readonly form-control" id="payment" value="BCA - 00000000" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2"> Account Number </label>
                                    <input name="account-number" type="text" class="form-control" id="accountNumber" value="{{old('account-number')}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2"> Account Name </label>
                                    <input name="account-name" type="text" class="form-control" id="accountName" value="{{old('account-name')}}">
                                </div>

                                <label class="mb-2"> Proof of Payment </label>
                                <div class="input-group custom-file-button mb-3">
                                    <label class="input-group-text input-group-file" for="inputGroupFile">Choose a File</label>
                                    <input type="file" class="orange form-control" id="inputGroupFile" name="photo">
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger form-outline mb-4" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                <div class="purchase-btn d-flex justify-content-center mt-4">
                                    <button type="submit">Purchase</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
