@extends('layout.layout')

@section('title', 'history')
@section('content')

    <section class="history">
        <div class="container manage-container mt-5" style="width: 80%;">
            @foreach ($transactions as $transaction)
                <div class="accordion accordion-container" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapse" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapse">
                                Transaction Date: {{ $transaction->transaction_date }}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-heading">
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

                                    <tr>
                                        <td style="width: 60%;">
                                            PRODUCT NAME
                                        </td>
                                        <td>
                                            PRODUCT QUANTITY
                                        </td>
                                        <td>
                                            PRODUCT PRICE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 60%;">
                                            PRODUCT NAME
                                        </td>
                                        <td>
                                            PRODUCT QUANTITY
                                        </td>
                                        <td>
                                            PRODUCT PRICE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 60%;">
                                            PRODUCT NAME
                                        </td>
                                        <td>
                                            PRODUCT QUANTITY
                                        </td>
                                        <td>
                                            PRODUCT PRICE
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Total
                                        </th>
                                        <th>
                                            TOTAL PRODUK
                                        </th>
                                        <th>
                                            TOTAL PRICE
                                        </th>
                                    </tr>

                                    <tr class="orange">
                                        <th>Transaction Status DONE OPO ORA KALO KELAR IJO KALO GA KELAR</th>
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
