@extends('admin.includes.admin_master')

@section('title', 'Users')

@section('admin')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Users
                <a href="{{route('admin.view_users')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Full Name</label>
                    <p class="form-control">{{$user->name}}</p>
                </div>

                <div class="mb-3">
                    <label>Email Id</label>
                    <p class="form-control">{{$user->email}}</p>
                </div>

                <div class="mb-3">
                    <label>Created at</label>
                    <p class="form-control">{{$user->created_at->format('d/m/y')}}</p>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection