@extends('admin.master.main')
@section('title','Category')
@section('content')

<table class="table table-bordered align-middle">
    <thead class="table-light">
      <tr>
        <th>Category Name</th>
        <th>Category Image</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $cat)
      <tr>
        <td>{{$cat->cat_name}}</td>
        <td><img
            src="{{ url('myimages/'.$cat->cat_image) }}"
            width="100px"
            height="70px"
            alt="Category Image"
            style="border-radius: 7%; box-shadow: 0 2px 6px rgba(0,0,0,0.2); border: 1px solid #ccc; object-fit: cover; transition: transform 0.3s;"
            onmouseover="this.style.transform='scale(1.1)'"
            onmouseout="this.style.transform='scale(1)'"/>
        </td>
        <td>{{$cat->cat_description}}</td>
        <td>
            <a href="{{ route('admin.editcategory',['id'=>$cat->cat_id])}}"> <button class="btn btn-primary btn-sm">Edit</button></a>

            <a href="{{ route('admin.delcategory',['id'=>$cat->cat_id])}}"><button type="button" class="btn btn-outline-primary m-2">Delete</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
