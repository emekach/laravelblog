@extends('admin.includes.admin_master')

@section('title','Add new Category')

@section('admin')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Category</h4>
        </div>
        <div class="card-body">

            <form action="{{route('admin.add_category')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Category Name</label>

                    <input type="text" class="form-control" name="name">

                </div>
                @if($errors->has('name'))
                <div class="alert alert-warning">{{$errors->first('name')}}</div>
                @endif

                <div class="mb-3">
                    <label>Slug </label>
                    <input type="text" class="form-control" name="slug">

                </div>

                @if($errors->has('slug'))

                <div class="alert alert-warning">{{$errors->first('slug')}}</div>

                @endif


                <div class="mb-3">
                    <label>Description </label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>

                @if($errors->has('description'))
                <div class="alert alert-warning">{{$errors->first('description')}}</div>
                @endif

                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                @if($errors->has('image'))
                <div class="alert alert-warning"> {{$errors->first('image')}}</div>
                @endif

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>

                @if($errors->has('meta_title'))
                <div class="alert alert-warning">{{$errors->first('meta_title')}}</div>
                @endif
                <div class="mb-3">
                    <label>Meta Description </label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>
                @error('meta_description')
                <div class="alert alert-warning">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <label>Meta Keywords </label>
                    <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                </div>

                @error('meta_keyword')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status">

                    </div>

                    <div class="col-md-6"><button class="btn btn-primary" type="submit">Save Category</button></div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection