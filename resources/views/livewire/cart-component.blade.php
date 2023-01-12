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

    @if (session()->has('message'))
        @foreach (explode('-', session('message')) as $message)
            <script>
                Swal.fire({
                    title: '{{ $message }}',
                    icon: 'warning',
                    confirmButtonColor: '#E38B2A'
                })
            </script>
        @endforeach
    @endif

    <section class="cart">

        <div class="container manage-container" style="width: 60%;">

            @if (sizeof($carts) == 0)
                <div class = 'pt-3' style="text-align: center;">
                    <h3 class="orange">Cart is Empty</h3>
                </div>
            @else

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
                                            value="{{ $carts[$i]->qty }}" min="1" max="5">
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
                @if (sizeof($carts) != 0)
                    <div class="row justify-content-center">
                        <a style="text-decoration: none; width: 40%;" href="/purchase">
                            <button type="button" class="btn btn-success" style="display: flex; width: 100%; justify-content: center; border-radius: 0">Purchase via Whatsapp
                                <div style="width: 1.8vw; margin-left: 0.8vw"><svg style="fill: white;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16.6 14c-.2-.1-1.5-.7-1.7-.8-.2-.1-.4-.1-.6.1-.2.2-.6.8-.8 1-.1.2-.3.2-.5.1-.7-.3-1.4-.7-2-1.2-.5-.5-1-1.1-1.4-1.7-.1-.2 0-.4.1-.5.1-.1.2-.3.4-.4.1-.1.2-.3.2-.4.1-.1.1-.3 0-.4-.1-.1-.6-1.3-.8-1.8-.1-.7-.3-.7-.5-.7h-.5c-.2 0-.5.2-.6.3-.6.6-.9 1.3-.9 2.1.1.9.4 1.8 1 2.6 1.1 1.6 2.5 2.9 4.2 3.7.5.2.9.4 1.4.5.5.2 1 .2 1.6.1.7-.1 1.3-.6 1.7-1.2.2-.4.2-.8.1-1.2l-.4-.2m2.5-9.1C15.2 1 8.9 1 5 4.9c-3.2 3.2-3.8 8.1-1.6 12L2 22l5.3-1.4c1.5.8 3.1 1.2 4.7 1.2 5.5 0 9.9-4.4 9.9-9.9.1-2.6-1-5.1-2.8-7m-2.7 14c-1.3.8-2.8 1.3-4.4 1.3-1.5 0-2.9-.4-4.2-1.1l-.3-.2-3.1.8.8-3-.2-.3c-2.4-4-1.2-9 2.7-11.5S16.6 3.7 19 7.5c2.4 3.9 1.3 9-2.6 11.4"/></svg></div>
                            </button>
                        </a>
                    </div>
                @endif
            @endif

        </div>

    </section>
    @livewireScripts
    {{-- @endsection --}}
</div>
