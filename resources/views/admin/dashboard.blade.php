@extends('layout.layout')

@section('title', 'dashboard')

@section('content')
<section class="admin_dashboard">

    <div class="container manage-container pb-5" style="width: 60%;">

        <div class="row pb-3">

            <div class="col input-group-header">
                <h2 class="orange">Manage Category</h4>
            </div>

        </div>

        <div class="row pb-3">
            <div class="form-outline mb-4">
                <form class="input-group" action="" method="GET">
                    <input type="search" class="search-button form-control" name="search" placeholder="Add Category">
                    <button type="submit" class="btn btn-search btn-primary search-icon ">
                        <i style class="fas fa-plus"></i>
                    </button>
                </form>
            </div>
        </div>

        @foreach($categories2 as $category)
            <div class="card-parent card flex-lg-row mx-auto mb-3 shadow">
                <div class="card-body manage-card-body">
                    <h5 class="orange card-title pt-3 ps-3">{{$category->name}}</h5>
                </div>
                <div class="card-body d-flex" style="flex-direction: column;">
                    <div class="row align-items-center h-100 justify-content-end pe-3">
                        <a href="" style="text-decoration: none; width:auto">
                            <button type="button" class="btn btn-delete btn-outline-primary rounded-circle" style="width: 42px; height: 42px">
                                <i class="fas fa-solid fa-trash"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="pagination-manage">
            {{ $categories2->links() }}
        </div>
    </div>

    <div class="container manage-container" style="width: 60%;">

        <div class="row justify-content-between pb-3">

            <div class="col-4 input-group-header">
                <h2 class="orange">Manage Product</h4>
            </div>

            <div class="col-4 input-group-header">
                <div class="input-group add-product justify-content-end">
                    <a href="{{ url('add') }}" style="text-decoration: none;">
                        <button type="button" class="btn btn-add btn-secondary ms-auto search-icon add-button">
                            <i style="color:white" class="fas fa-plus"></i>
                            Add Product
                        </button>
                    </a>
                </div>
            </div>

        </div>

        <div class="row pb-3">
            <div class="form-outline mb-4">
                <form class="input-group" action="" method="GET">
                    <input type="search" class="search-button form-control" name="search" placeholder="Search">
                    <button type="submit" class="btn btn-search btn-primary search-icon ">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        @foreach($products as $product)
            <div class="card-parent card flex-lg-row mx-auto mb-3 shadow">
                <div class="image-container">
                    <img class="img-fluid image-left" src="{{asset('image/'.$product->photo)}}" style="width: 200px; height: 200px;">
                </div>
                <div class="card-body manage-card-body">
                    <h5 class="orange card-title pt-3 ps-3">{{ $product->name }}</h5>
                    <h7 class="orange card-title ps-3">Rp {{ $product->price }}</h7>
                </div>
                <div class="card-body d-flex" style="flex-direction: column;">
                    <div class="row align-items-center h-100 justify-content-end pe-3">
                        <a href="/edit/{{ $product->id }}" style="text-decoration: none; width:auto">
                            <button type="button" class="btn btn-edit btn-outline-primary rounded-circle" style="width: 42px; height: 42px">
                                <i class="fas fa-sharp fa-solid fa-pen"></i>
                            </button>
                        </a>
                    </div>

                    <div class="row align-items-center h-100 justify-content-end pe-3">
                        <a href="" style="text-decoration: none; width:auto">
                            <button type="button" class="btn btn-delete btn-outline-primary rounded-circle" style="width: 42px; height: 42px">
                                <i class="fas fa-solid fa-trash"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="pagination-manage">
            {{ $products->links() }}
        </div>
    </div>

</section>
@endsection
