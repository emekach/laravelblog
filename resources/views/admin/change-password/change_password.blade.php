@extends('admin.includes.admin_master')

@section('title', 'Add Posts')

@section('admin')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Change Password</h4>
        </div>
        <div class="card-body">
            <form action="{{route('update.password')}}" method="post" enctype="multipart/form-data">
                @csrf


                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif


                <div class="mb-3">
                    <label for="">Old Password</label>
                    <input type="text" name="old_password" class="form-control">
                </div>
                @error('old_password')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror
                <div class="mb3">
                    <label for="">New Password</label>
                    <input type="text" name="new_password" class="form-control">
                </div>
                @error('new_password')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror

                <div class="mb3">
                    <label for="">Confirm Password</label>
                    <input type="text" name="confirm_password" class="form-control">
                </div>
                @error('confirm_password')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror

                <br>

                <div class="col-md-8">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection