@extends('admin.master.main')
@section('title','UserInfo')
@section('content')


<div class="container" style="background-color: rgb(0, 0, 0); border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 20px;">
    <h2 style="margin-bottom: 20px;">User Details</h2>
    <table class="table table-striped table-hover">
      <thead style="background-color: #0d6efd; color: white;">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Cerated at Date</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td> <!-- Not recommended to show -->
        <td>{{ $user->created_at }}</td>
        <td>
            <a href="{{ route('admin.deleteuser',['id'=>$user->id]) }}">
                    <button
                 style="
      background-color: #e63946;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    "
    onmouseover="this.style.backgroundColor='#d62828'; this.style.transform='scale(1.05)'"
    onmouseout="this.style.backgroundColor='#e63946'; this.style.transform='scale(1)'"
    onmousedown="this.style.transform='scale(0.98)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.2)'"
    onmouseup="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'"
  >
    🗑️ Delete
                    </button>
            </a>
        </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

@endsection
