@extends('layout.layout')

@section('title', 'add')
@section('content')

<section class="admin_add_and_edit">

    <div class="container manage-container pb-5" style="width: 60%;">

        <div class="row pb-3">

            <div class="col d-flex input-group-header">
                <a href="{{ url('manage') }}" style="text-decoration: none;">
                    <button type="button" class="btn btn-back btn-secondary">
                        <i style="color:white" class="fas fa-arrow-circle-left"></i> Back
                    </button>
                </a>
                <div style="position: absolute; left:50%; transform:translate(-50%);">
                    <h2 class="orange">Add Product</h2>
                </div>
            </div>

        </div>


        <div class="card-body">
            <form action="/add" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <div class="mb-3">
                        <label for="name" class="orange form-label">Product Name</label>
                        <input value="{{ old('name') }}" type="text" class="orange form-control" id="name" name="name">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="orange form-label">Description</label>
                    <textarea class="orange form-control" id="description" rows="7" name="description">{{{ old('description') }}}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="category" class="orange form-label">Category Product</label>
                    <select class="orange form-select" aria-label="Default select example" name="category">
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

                <div class="form-group mb-3">
                    <label for="price" class="orange form-label">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">IDR</span>
                        </div>
                        <input value="{{ old('price') }}" type="text" class="orange form-control" id="price" name="price">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="mb-3">
                        <label for="name" class="orange form-label">Stock</label>
                        <input value="{{ old('stock') }}" type="text" class="orange form-control" id="stock" name="stock">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="mb-3">
                        <label for="name" class="orange form-label">Tokopedia Link</label>
                        <input value="{{ old('link_tokopedia') }}" type="text" class="orange form-control" id="link_tokopedia" name="link_tokopedia">
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="mb-3">
                        <label for="name" class="orange form-label">Shopee Link</label>
                        <input value="{{ old('link_shopee') }}" type="text" class="orange form-control" id="link_shopee" name="link_shopee">
                    </div>
                </div>

                <div class="input-group custom-file-button mb-3">
                    <label class="input-group-text input-group-file" for="inputGroupFile">Choose a File</label>
                    <input type="file" class="orange form-control" id="inputGroupFile" name="photo">
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger form-outline mb-4" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif

                <div class="col-md-12 text-center pt-3">
                    <button type="submit" class="btn btn-add btn-outline-secondary justify-content-center">ADD</button>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
