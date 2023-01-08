@extends('layout.layout')

@section('title', 'detail')

@section('content')
    <section class="detail">
        <div class="container mt-3" style="width: 80%; ">
            <div class="row">
                <div class="col">
                    <form>
                        <input type="text" placeholder="Search">
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="row mt-4" style="margin: auto; width: 95%;">
                <div class="col-12 col-lg-6 d-flex">
                    <div class="detail-image-container">
                        <img src="{{ asset('image/' . $product->photo) }}" alt="...">
                    </div>
                </div>
                <div class="col-12 col-lg-6 product-info">
                    <h1>{{ $product->name }}</h1>
                    <h3 class="mt-4 mb-5">Rp. {{ $product->price }}</h3>
                    <div class="quantity mb-5 d-md-flex align-items-center">
                        <label for="kuantitas">Kuantitas:</label>
                        <input type="number" id="kuantitas">
                        <p style="margin: 0;">Stok {{ $product->stok }}</p>
                    </div>
                    <div class="logo-container mb-3 d-flex justify-content-center">
                        <a href="{{ $product->tokopedia_link }}"><img src="{{ asset('/image/tokopedia.png') }}"
                                alt="..."></a>
                        <a href="{{ $product->shopee_link }}"><img src="{{ asset('/image/shopee.png') }}"
                                alt="..."></a>
                    </div>
                    <div class="detail-add-cart d-flex justify-content-center">
                        <button>
                            <i class="fas fa-plus"></i>Add to cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="desc-wrapper">
                <div class="row container-title d-flex align-items-center" style="margin: 0;">
                    <div class="col">
                        <h5>Description</h5>
                    </div>
                </div>
                <div class="row desc" style="margin: 0;">
                    <div class="desc-title">
                        <h5>Item Detail</h5>
                    </div>
                    <div class="desc-body">
                        <p>{{ $product->detail }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-5" style="color: #E38B2A">
                <h1>Other Product</h1>
            </div>
            <div class="card-container">
                <div class="row container-title d-flex align-items-center">
                    <div class="col">
                        <h5>{{ $product->category->name }}</h5>
                    </div>
                    <div class="col view-all d-flex justify-content-end">
                        <a href="#">View all...</a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 container-body">
                    @foreach ($products as $prdct)
                        <div class="col">
                            <a class="card-link" href="/detail/{{ $prdct->id }}">
                                <div class="card h-100">
                                    <img src="{{ asset('image/' . $prdct->photo) }}" class="img-fluid card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $prdct->name }}</h5>
                                        <p class="card-text">Rp. {{ $prdct->price }}</p>
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
