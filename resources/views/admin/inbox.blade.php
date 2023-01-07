@extends('layout.layout')

@section('title', 'category')

@section('content')
    <section class="inbox">
        <h3 class="text-center mt-3 orange" style="font-weight: bold;">INBOX</h3>
        <div class="container-fluid" style="width: 80%; ">
            <div class="card-container mt-5">
                <div class="row container-title d-flex align-items-center" style="height: 10vh">
                    <div class="col" style="padding-left: 30px;">
                        <h5>Transaction Date</h5>
                    </div>
                    <div class="col d-flex justify-content-end" style="padding-right: 30px;">
                        <a href="" style="text-decoration: none; width:auto;">
                            <button type="button" class="btn btn-delete btn-outline-danger rounded-circle"
                                style="width: 42px; height: 42px">
                                <i class="fas fa-solid fa-trash"></i>
                            </button>
                        </a>
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
                                    Czar Kevin Sanjaya Soecahyo
                                </td>
                            </tr>
                            <tr style="width: 70%;">
                                <td style="font-weight: bold;">
                                    Number Phone
                                </td>
                                <td>
                                    081xxxxxxx
                                </td>
                            </tr>
                            <tr style="width: 70%;">
                                <td style="font-weight: bold;">
                                    Address
                                </td>
                                <td>
                                    Sidoarjo
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="downside mt-3" style="padding: 0">
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <div class="inbox-image-container">
                                    <img src="{{ url('/image/dummy-book.jpg') }}" alt="...">
                                </div>
                            </div>
                            <div class="col-9 d-flex align-items-center">
                                <table style="width: 60%;">
                                    <tr style="width: 70%;">
                                        <td style="font-weight: bold;">
                                            Product Name
                                        </td>
                                        <td>
                                            Kemeja Batik
                                        </td>
                                    </tr>
                                    <tr style="width: 70%;">
                                        <td style="font-weight: bold;">
                                            Quantity
                                        </td>
                                        <td>
                                            2
                                        </td>
                                    </tr>
                                    <tr style="width: 70%;">
                                        <td style="font-weight: bold;">
                                            Sub Total
                                        </td>
                                        <td>
                                            Rp 200.000
                                        </td>
                                    </tr>
                                    <tr style="width: 70%;">
                                        <td style="font-weight: bold;">
                                            Total
                                        </td>
                                        <td>
                                            Rp 400.000
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
