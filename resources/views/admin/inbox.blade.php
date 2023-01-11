@extends('layout.layout')

@section('title', 'inbox')

@section('content')
    <section class="inbox">
        <h3 class="text-center mt-3 mb-3 orange" style="font-weight: bold;">INBOX</h3>
        @foreach ($transactionHeaders as $transactionHeader)
            <div class="container-fluid" style="width: 80%; ">
                <div class="card-container mt-5">
                    <div class="row container-title d-flex align-items-center" style="height: 10vh">
                        <div class="col" style="padding-left: 30px;">
                            <h5>Transaction Date: {{ $transactionHeader->transaction_date }}</h5>
                        </div>
                        <div class="col d-flex justify-content-end" style="padding-right: 30px;">
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
                                            <button type="button" class="btn btn-success w-25">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row container-body">
                        <div class="upside">
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
                        @foreach ($transactionHeader->transactiondetail as $transactionDetail)
                            <div class="downside mt-3" style="padding: 0">
                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                        <div class="inbox-image-container">
                                            <img src="{{ asset('/image/' . $transactionDetail->product->photo) }}"
                                                alt="...">
                                        </div>
                                    </div>
                                    <div class="col-3 d-flex flex-column align-items-start justify-content-center ms-3">
                                        <h5 style="font-size: 1em; font-weight:bold">Product Name</h5>
                                        <h5 style="font-size: 1em; font-weight:bold">Quantity</h5>
                                        <h5 style="font-size: 1em; font-weight:bold; margin-right: auto;">Sub Total</h5>
                                    </div>
                                    <div class="col-4 d-flex flex-column align-items-start justify-content-center">
                                        <h5 style="font-size: 1em; font-weight:400">{{ $transactionDetail->product->name }}
                                        </h5>
                                        <h5 style="font-size: 1em; font-weight:400">{{ $transactionDetail->quantity }}</h5>
                                        <h5 style="font-size: 1em; font-weight:400; margin-right: auto;">Rp
                                            {{ $transactionDetail->quantity * $transactionDetail->product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @endforeach


    </section>
@endsection
