@extends('admin.includes.admin_master')

@section('title', 'Blog Posts')

@section('admin')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>View Posts<a href="{{route('admin.add_post')}}" class="btn btn-primary float-end">Add Post</a></h4>
        </div>
        <div class="card-body">
            @if(Session::has('error'))
            <div class="alert alert-success">{{session::get('error')}}</div>
            @endif

            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($post->isEmpty())

                    @else

                    @foreach($post as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{optional($item->category)->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->status == '1' ? 'Hidden': 'Visible' }}</td>
                        <td>
                            <a href="{{route('admin.edit_post',['post_id'=>$item->id])}}" class="btn btn-success">Edit</a>

                            <a href="{{route('admin.delete_post',['post_id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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