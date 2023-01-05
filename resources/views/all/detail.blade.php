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
                <div class="col-6 d-flex">
                    <div class="detail-image-container">
                        <img src="{{ url('/image/dummy-book.jpg') }}" alt="...">
                    </div>
                </div>
                <div class="col-6 product-info">
                    <h1>Nama Produk</h1>
                    <h3 class="mt-4 mb-5">Rp. 100.000</h3>
                    <div class="quantity mb-5 d-flex align-items-center">
                        <label for="kuantitas">Kuantitas:</label>
                        <input type="number" id="kuantitas">
                        <p style="margin: 0;">Stok 20</p>
                    </div>
                    <div class="logo-container mb-3 d-flex justify-content-center">
                        <a href=""><img src="{{ url('/image/tokopedia.png') }}" alt="..."></a>
                        <a href=""><img src="{{ url('/image/shopee.png') }}" alt="..."></a>
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
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure suscipit iusto culpa est ex. Amet
                            non
                            aperiam tempora praesentium facilis quibusdam saepe illo ipsa natus atque, expedita corporis, a
                            provident!</p>
                    </div>
                </div>
            </div>

            <div class="mt-5" style="color: #E38B2A">
                <h1>Other Product</h1>
            </div>
            <div class="card-container">
                <div class="row container-title d-flex align-items-center">
                    <div class="col">
                        <h5>Fashion</h5>
                    </div>
                    <div class="col view-all d-flex justify-content-end">
                        <a href="#">View all...</a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 container-body">
                    <div class="col">
                        <div class="card h-100">
                            <img src="..." class="img-fluid card-img-top" alt="...">
                            <a class="card-link" href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Kemeja Batik</h5>
                                    <p class="card-text">Rp. 200.000</p>
                                </div>
                            </a>
                            <button class="add-cart-btn">
                                <i class="fas fa-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="..." class="img-fluid card-img-top" alt="...">
                            <a class="card-link" href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Kemeja Batik</h5>
                                    <p class="card-text">Rp. 200.000</p>
                                </div>
                            </a>
                            <button class="add-cart-btn">
                                <i class="fas fa-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="..." class="img-fluid card-img-top" alt="...">
                            <a class="card-link" href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Kemeja Batik</h5>
                                    <p class="card-text">Rp. 200.000</p>
                                </div>
                            </a>
                            <button class="add-cart-btn">
                                <i class="fas fa-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="..." class="img-fluid card-img-top" alt="...">
                            <a class="card-link" href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Kemeja Batik</h5>
                                    <p class="card-text">Rp. 200.000</p>
                                </div>
                            </a>
                            <button class="add-cart-btn">
                                <i class="fas fa-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="..." class="img-fluid card-img-top" alt="...">
                            <a class="card-link" href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Kemeja Batik</h5>
                                    <p class="card-text">Rp. 200.000</p>
                                </div>
                            </a>
                            <button class="add-cart-btn">
                                <i class="fas fa-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="..." class="img-fluid card-img-top" alt="...">
                            <a class="card-link" href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Kemeja Batik</h5>
                                    <p class="card-text">Rp. 200.000</p>
                                </div>
                            </a>
                            <button class="add-cart-btn">
                                <i class="fas fa-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
