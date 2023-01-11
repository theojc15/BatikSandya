@section('title', 'cart')
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @php
        $total = 0;
        for ($i = 0; $i < sizeof($carts); $i++) {
            $total += $carts[$i]->qty * $user->product[$i]->price;
        }
    @endphp

    {{-- @section('content') --}}


    <section class="cart">

        <div class="container manage-container" style="width: 60%;">

            <div class="row justify-content-lg-between pt-5 pb-3 flex-column flex-lg-row">
                <div class="col-4 input-group-header d-flex">
                    <i class="orange fas fa-shopping-bag fa-3x"> </i>
                    <span class="orange ps-3" style="font-size: 2.5rem;"> Cart </span>
                </div>

                <div class="col-4 input-group-header input-group-header-2">
                    <div class="input-group align-items-center h-100 justify-content-center justify-content-lg-end">
                        <h3 class="orange"> <b> Total </b> Rp {{ $total }} </h3>
                    </div>
                </div>

            </div>

            @for ($i = 0; $i < sizeof($carts); $i++)
                <div class="card-parent card flex-lg-row mx-auto mb-3 shadow">
                    <div class="image-container">
                        <img class="img-fluid image-left" src="{{ asset('image/' . $user->product[$i]->photo) }}"
                            style="width: 100%; height: 200px;">
                    </div>
                    <div class="card-body manage-card-body">
                        <div class="row pt-3 ps-lg-3 text-center text-lg-start">
                            <h5 class="orange card-title">{{ $user->product[$i]->name }}</h5>
                        </div>
                        <div class="row ps-lg-3 text-center text-lg-start">
                            <h7 class="orange card-title">{{ $user->product[$i]->price }}</h7>
                        </div>

                        <div class="row d-flex flex-column flex-lg-row pt-4">
                            <div class="col-lg-7">
                                <div class="input-group ps-lg-3 pt-7">
                                    <span class="input-group-btn">
                                        <button type="button" wire:click.prevent="decrease('{{ $carts[$i]->id }}')"
                                            class="quantity-left-minus btn btn-quantity btn-danger btn-number"
                                            data-type="minus" data-field="">
                                            <span class="orange fas fa-solid fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity"
                                        class="orange form-control input-number text-center"
                                        value="{{ $carts[$i]->qty }}" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button wire:click.prevent="increase('{{ $carts[$i]->id }}')" type="button"
                                            class="quantity-right-plus btn btn-quantity btn-success btn-number"
                                            data-type="plus" data-field="">
                                            <span class="orange fas fa-solid fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="col-lg-5 justify-content-end text-center text-lg-start">
                                <h7 class="orange card-title">Total Rp {{ $carts[$i]->qty * $user->product[$i]->price }}
                                </h7>
                            </div>
                        </div>
                    </div>

                    <div class="card-body d-flex" style="flex-direction: column;">
                        <div class="row align-items-center h-100 justify-content-end pe-3">
                            <a href="/deletecart/{{ $carts[$i]->id }}" style="text-decoration: none; width:auto">
                                <button type="button" class="btn btn-delete btn-outline-primary rounded-circle"
                                    style="width: 42px; height: 42px">
                                    <i class="fas fa-solid fa-trash"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor

        </div>

    </section>
    @livewireScripts
    {{-- @endsection --}}
</div>
