@extends('admin.master.main')
@section('title','Contact')
@section('content')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->contact_name}}</td>
                        <td>{{$contact->contact_email}}</td>
                        <td>{{$contact->contact_subject}}</td>
                        <td>{{$contact->contact_message}}</td>
                        <td>
                           {{-- <a href="{{ route('admin.contact.edit',['id'=>$contact->contact_id])}}"><button type="button" class="btn btn-outline-success m-2">Edit</button></a> --}}
                           <a href="{{ route('admin.contact.delete',['id'=>$contact->contact_id])}}"><button type="button" class="btn btn-outline-primary m-2">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
