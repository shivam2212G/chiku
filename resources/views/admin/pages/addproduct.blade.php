@extends('admin.master.main')
@section('title','Add Product')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form enctype="multipart/form-data" action="{{ route('admin.addproduct') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" name="pro_name"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Select Image</label>
                        <input class="form-control form-control-sm bg-dark" id="formFileSm" type="file" name="pro_image">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="pro_price">
                        <span class="input-group-text">.00</span>
                    </div>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="pro_category">
                        @foreach ($category as $cat)
                        <option >{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Description" name="cat_description" id="floatingTextarea" style="height: 150px;" name="pro_description"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
