@extends('admin.includes.admin_master')

@section('title', 'Users')

@section('admin')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Users

            </h4>
        </div>

        <div class="card-body">

            @if(Session::has('error'))
            <div class="alert alert-success">{{session::get('error')}}</div>
            @endif
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($users->isEmpty())
                    <tr>
                        <td colspan="5">No user found</td>
                    </tr>
                    @else

                    @foreach($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a href="{{route('admin.edit_users',['user_id'=>$item->id])}}" class="btn btn-success">Edit</a>

                            <a href="{{route('admin.edit_users',['user_id'=>$item->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                    @endif

                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection