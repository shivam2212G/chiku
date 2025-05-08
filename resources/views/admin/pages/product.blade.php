@extends('admin.master.main')
@section('title','Products')
@section('content')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Table</h6>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro )
                  <tr>
                    <td>{{$pro->product_name}}</td>
                    <td><img
                        src="{{ url('myimages/'.$pro->product_image) }}"
                        width="130px"
                        height="70px"
                        alt="Product Image"
                        style="border-radius: 7%; box-shadow: 0 2px 6px rgba(0,0,0,0.2); border: 1px solid #ccc; object-fit: cover; transition: transform 0.3s;"
                        onmouseover="this.style.transform='scale(1.1)'"
                        onmouseout="this.style.transform='scale(1)'"/></td>
                    <td>{{$pro->product_price}}</td>
                    <td>{{$pro->product_category}}</td>
                    <td>{{$pro->product_description}}</td>
                    <td>
                      <a href="{{ route('admin.editproduct',['id'=>$pro->product_id])}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                      <a href="{{ route('admin.deleteproduct',['id'=>$pro->product_id])}}"><button class="btn btn-danger btn-sm">Delete</button></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection
mic
