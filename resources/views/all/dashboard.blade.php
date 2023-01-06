@extends('layout.layout')

@section('title', 'dashboard')

@section('content')
    <section class="dashboard">
        <div class="container-fluid mt-3" style="width: 80%; ">
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

            <div class="card-container mt-5">
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

            <div class="card-container mt-5">
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
