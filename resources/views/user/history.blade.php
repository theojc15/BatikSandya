@extends('layout.layout')

@section('title', 'history')

@section('content')

    <section class="history">
        <div class="container manage-container mt-5" style="width: 80%;">
            @foreach ($transactions as $transaction)
                @php
                    $total = 0;
                    $produk = 0;
                @endphp
                <div class="accordion accordion-container mt-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapse{{$transaction->id}}" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapse{{$transaction->id}}">
                                Transaction Date: {{ $transaction->transaction_date }}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse{{$transaction->id}}" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-heading{{$transaction->id}}">
                            <div class="accordion-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Sub Price
                                        </th>
                                    </tr>

                                    @foreach ($transaction->transactiondetail as $transactionDetail)
                                        <tr>
                                            <td style="width: 60%;">
                                                {{ $transactionDetail->product->name }}
                                            </td>
                                            <td>
                                                {{ $transactionDetail->quantity }}
                                            </td>
                                            <td>
                                                {{ $transactionDetail->product->price * $transactionDetail->quantity }}
                                            </td>
                                        </tr>

                                        @php
                                            $total += $transactionDetail->product->price * $transactionDetail->quantity;
                                            $produk += $transactionDetail->quantity;
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <th>
                                            Total
                                        </th>
                                        <th>
                                            {{ $produk }}
                                        </th>
                                        <th>
                                            {{ $total }}
                                        </th>
                                    </tr>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </section>

@endsection
