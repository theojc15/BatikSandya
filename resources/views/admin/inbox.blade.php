@extends('layout.layout')

@section('title', 'inbox')

@php
    $total = 0;
@endphp
@section('content')
    <section class="inbox">
        <div class="container-fluid" style="width: 80%; ">
            @if ($transactionHeaders->count() == 0)
                <div class='pt-3' style="text-align: center;">
                    <h3 class="orange">Inbox is Empty</h3>
                </div>
            @else
                <h3 class="text-center mt-3 mb-3 orange" style="font-weight: bold;">INBOX</h3>

                @foreach ($transactionHeaders as $transactionHeader)
                    <div class="card-container mt-5 mb-2">
                        <div class="row container-title d-flex align-items-center" style="height: 10vh">
                            <div class="col transaction-date" style="padding-left: 30px;">
                                <h5>Transaction Date: {{ $transactionHeader->transaction_date }}</h5>
                            </div>
                            <div class="col d-flex justify-content-end button-container" style="padding-right: 30px;">
                                <a href="/confirm/{{ $transactionHeader->id }}" class="me-2">
                                    <button type="button" class="btn btn-delete btn-outline-success rounded-circle"
                                        style="width: 42px; height: 42px">
                                        <i class="fas fa-solid fa-check"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-delete btn-outline-danger rounded-circle"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                    style="width: 42px; height: 42px">
                                    <i class="fas fa-solid fa-trash"></i>
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content"
                                            style="color:#E38B2A; background-color:#FDEEDC; border:none;">
                                            <div class="modal-body">
                                                <div class="mb-3 text-center mt-3">
                                                    <h3>Are You Sure You Want to Delete This Product?</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center" style="border-top:none;">
                                                <button type="button" class="btn btn-danger w-25"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <a href="/cancel/{{ $transactionHeader->id }}" class="me-2 w-25">
                                                    <button type="button" class="btn btn-success w-100">Confirm</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row container-body">
                            <div class="col-12 col-lg-7">
                                <table style="width: 60%;">
                                    <tr style="width: 70%;">
                                        <td style="font-weight: bold;">
                                            Name
                                        </td>
                                        <td>
                                            {{ $transactionHeader->user->name }}
                                        </td>
                                    </tr>
                                    <tr style="width: 70%;">
                                        <td style="font-weight: bold;">
                                            Number Phone
                                        </td>
                                        <td>
                                            {{ $transactionHeader->user->phone }}
                                        </td>
                                    </tr>
                                    <tr style="width: 70%;">
                                        <td style="font-weight: bold;">
                                            Address
                                        </td>
                                        <td>
                                            {{ $transactionHeader->user->address }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div
                                class="col-12 col-lg-5 d-flex align-items-center justify-content-center justify-content-lg-end upside-down">
                                <a href="/download/{{ $transactionHeader->id }}" class="PoP-btn w-50 h-50"
                                    style=" text-decoration:none; font-size: 2.3em;">
                                    <button type="button" class="btn w-100 h-100"
                                        style="border: 1px #E38B2A solid; gap: 10px; color: #E38B2A; display:flex; justify-content:center; align-items:center;">
                                        <div style="width: 1.8vw; margin-right: 0.5vw;">
                                            <i class="fas fa-solid fa-download"></i>
                                        </div>
                                        Proof of Payment
                                    </button>
                                </a>
                            </div>
                            @foreach ($transactionHeader->transactiondetail as $transactionDetail)
                                <div class="downside mt-lg-3" style="padding: 0">
                                    <div class="row flex-column flex-lg-row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <div class="inbox-image-container">
                                                <img src="{{ asset('/image/' . $transactionDetail->product->photo) }}"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="d-flex col-lg-9">
                                            <div
                                                class="col-3 d-flex flex-column align-items-start justify-content-center ms-lg-3 key">
                                                <h5 style="font-size: 1em; font-weight:bold">Product Name</h5>
                                                <h5 style="font-size: 1em; font-weight:bold">Quantity</h5>
                                                <h5 style="font-size: 1em; font-weight:bold; margin-right: auto;">Sub Total
                                                </h5>
                                            </div>
                                            <div
                                                class="col-3 d-flex flex-column align-items-start justify-content-center w-75 value">
                                                <h5 style="font-size: 1em; font-weight:400">
                                                    {{ $transactionDetail->product->name }}
                                                </h5>
                                                <h5 style="font-size: 1em; font-weight:400">
                                                    {{ $transactionDetail->quantity }}
                                                </h5>
                                                <h5 style="font-size: 1em; font-weight:400; margin-right: auto;">Rp
                                                    {{ $transactionDetail->quantity * $transactionDetail->product->price }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $total = $total + ($transactionDetail->quantity * $transactionDetail->product->price);
                                @endphp
                            @endforeach
                            <div class="row pt-3">
                                <div class="col-3 d-flex flex-column align-items-start justify-content-center me-3 total-key"
                                    style="padding:0;">
                                    <h5 style="font-size: 1em; font-weight:bold;">Total</h5>
                                </div>
                                <div class="col-7 d-flex flex-column align-items-start justify-content-center total-value">
                                    <h5 style="font-size: 1em; font-weight:400">Rp {{ $total }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
