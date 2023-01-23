@extends('layout.layout')

@section('title', 'category')

@section('content')
    <section class="category">
        <div class="container-fluid mt-3" style="width: 80%; ">
            <div class="row">
                <div class="col">
                    <form action="/search" method="GET">
                        @csrf
                        <input type="text" placeholder="Search" value="{{ $search }}" name="search">
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="card-container mt-5">
                <div class="row container-title d-flex align-items-center">
                    <div class="col">
                        <h5>Search Result</h5>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5 g-4 container-body">
                    @foreach ($products as $product)
                        <div class="col pt-4">
                            <a class="card-link" href="/detail/{{ $product->id }}">
                                <div class="card h-100">
                                    <img src="{{ asset('image/' . $product->photo) }}" class="img-fluid card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">Rp. {{ $product->price }}</p>
                                    </div>
                                    <button class="add-cart-btn">
                                        <i class="fas fa-plus"></i> Add to cart
                                    </button>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
