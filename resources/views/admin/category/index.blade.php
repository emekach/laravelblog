@extends('admin.includes.admin_master')

@section('title', 'Categories')

@section('admin')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Category
                <a href="{{route('admin.add_category')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
            </h4>
        </div>

        <div class="card-body">

            @if(Session::has('error'))
            <div class="alert alert-success">{{session::get('error')}}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>

                    @if($category->isEmpty())
                    <p>No category found</p>
                    @else

                    @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><img src="{{asset('admin/uploads/category/'.$item->image)}}" alt="" width="50px" height="50px"></td>

                        <td>{{$item->status == '1' ? 'Hidden': 'Shown' }}</td>
                        <td>
                            <a href="" class="btn btn-success">Edit</a>
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