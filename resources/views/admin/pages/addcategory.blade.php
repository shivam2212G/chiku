@extends('admin.master.main')
@section('title','Add Category')
@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form enctype="multipart/form-data" action="{{ route('admin.addcategory') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" name="cat_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Category Image</label>
                        <input class="form-control form-control-sm bg-dark" id="formFileSm" type="file" name="cat_image">
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Description" name="cat_description" id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
