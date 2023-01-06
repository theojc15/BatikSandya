@extends('layout.layout')

@section('title', 'add')
@section('content')

<section class="admin_add">

    <div class="container manage-container pb-5" style="width: 60%;">

                <div class="row pb-3">

                    <div class="col d-flex input-group-header">
                        <a href="{{ url('manage') }}" style="text-decoration: none;">
                            <button type="button" class="btn btn-secondary">
                                <i style="color:white" class="fas fa-arrow-circle-left"></i> Back
                            </button>
                        </a>    
                        <div style="position: absolute; left:50%; transform:translate(-50%);">
                            <h2 class="orange">Add Product</h2>
                        </div>
                    </div>

                </div>

                
                <div class="card-body">
                    <form action="{{ url('custom-add-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option selected hidden disabled value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    @if (old('category') == $category->id)
                                        <option value="{{ $category->id }}" selected> {{ $category->name }}
                                        </option>
                                    @else
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Detail</label>
                            <textarea class="form-control" id="description" rows="7" name="description">{{{ old('description') }}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group mb-3">  
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-left">IDR</span>
                                </div>
                                <input value="{{ old('price') }}" type="text" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Photo</label>
                            <input class="form-control" type="file" id="formFile" name = "file">
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Add</button>
                    </form>
                </div>
                

        
    </div>
</section>
@endsection