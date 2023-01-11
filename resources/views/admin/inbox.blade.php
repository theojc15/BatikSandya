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
                        <div class="col"><a href="/confirm/{{ $transactionHeader->id }}">DONE</a></div>
                        <div class="col d-flex justify-content-end" style="padding-right: 30px;">
                            <button type="button" class="btn btn-delete btn-outline-danger rounded-circle"
                                data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                style="width: 42px; height: 42px">
                                <i class="fas fa-solid fa-trash"></i>
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="color:#E38B2A; background-color:#FDEEDC; border:none;">
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
                                            <img src="{{ asset('/image/'.$transactionDetail->product->photo) }}" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <table style="width: 60%;">
                                            <tr style="width: 70%;">
                                                <td style="font-weight: bold;">
                                                    Product Name
                                                </td>
                                                <td>
                                                    {{ $transactionDetail->product->name }}
                                                </td>
                                            </tr>
                                            <tr style="width: 70%;">
                                                <td style="font-weight: bold;">
                                                    Quantity
                                                </td>
                                                <td>
                                                    {{ $transactionDetail->quantity }}
                                                </td>
                                            </tr>
                                            <tr style="width: 70%;">
                                                <td style="font-weight: bold;">
                                                    Sub Total
                                                </td>
                                                <td>
                                                    Rp {{ $transactionDetail->quantity * $transactionDetail->product->price }}
                                                </td>
                                            </tr>
                                        </table>
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
