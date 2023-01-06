@extends('layout.layout')

@section('title', 'dashboard')

@section('content')
    <section class="dashboard">
        <div class="container-fluid mt-3 mb-3" style="width: 80%; ">
            <div class="row">
                <div class="col">
                    <form>
                        <input type="text" placeholder="Search">
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <div class="dashboard-image-container">
                        <img src="{{ url('/image/header-dashboard.png') }}" alt="...">
                    </div>
                </div>
            </div>

            @foreach ($categories as $category)
                <div class="card-container mt-5">
                    <div class="row container-title d-flex align-items-center">
                        <div class="col">
                            <h5>{{$category->name}}</h5>
                        </div>
                        <div class="col view-all d-flex justify-content-end">
                            <a href="#">View all...</a>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 container-body">
                        @forelse ($category->product as $product)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset('image/'.$product->photo) }}" class="img-fluid card-img-top" alt="...">
                                    <a class="card-link" href="#">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$product->name}}</h5>
                                            <p class="card-text">Rp. {{$product->price}}</p>
                                        </div>
                                    </a>
                                    <button class="add-cart-btn">
                                        <i class="fas fa-plus"></i> Add to cart
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div style="display: flex; justify-content: center; width: 100%; margin: 0px">No Product</div>
                        @endforelse

                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
