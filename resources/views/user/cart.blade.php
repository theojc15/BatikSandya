@extends('layout.layout')

@section('title', 'login')

@section('content')

<section class="cart">

    <div class="container manage-container" style="width: 60%;">

        <div class="row justify-content-between pt-5 pb-3">
            <div class="col-4 input-group-header">
                <i class="orange fas fa-shopping-bag fa-3x"> </i>
                <span class = "orange ps-3"style="font-size: 2.5rem;"> Cart </span>
            </div>

            <div class="col-4 input-group-header">
                <div class="input-group align-middle justify-content-end">
                    <h3 class="orange"> <b> Total </b> Rp 400.000 </h3>
                </div>
            </div>

        </div>

        <div class="card-parent card flex-lg-row mx-auto mb-3 shadow">
            <div class="image-container">
                <img class="img-fluid image-left" src="{{asset('image/gerry.jpg')}}" style="width: 200px; height: 200px;">
            </div>
            <div class="card-body manage-card-body">
                <div class="row pt-3 ps-3"> 
                    <h5 class="orange card-title">placeholder</h5>
                </div>
                <div class="row ps-3"> 
                    <h7 class="orange card-title">placeholder</h7>
                </div>
                
                <div class="row d-flex pt-4"> 
                    <div class="col-lg-5">
                        <div class="input-group ps-3 pt-7">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-quantity btn-danger btn-number"  data-type="minus" data-field="">
                                    <span class="orange fas fa-solid fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="orange form-control input-number text-center" value="10" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-quantity btn-success btn-number" data-type="plus" data-field="">
                                    <span class="orange fas fa-solid fa-plus"></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-7 justify-content-end"> 
                        <h7 class="orange card-title">Total Rp 400.000</h7>
                    </div>
                </div>
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

    </div>

</section>
@endsection