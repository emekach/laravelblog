@extends('admin.includes.admin_master')

@section('title', 'Edit Posts')

@section('admin')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Posts<a href="{{route('admin.view_post')}}" class="btn btn-primary float-end">Back</a></h4>
        </div>
        <div class="card-body">
            <form action="{{route('admin.update_post',['post_id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" required id="" class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}" {{$post->category->id == $item->id ? 'selected' : ''}}>
                            {{$item->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror

                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control" value="{{$post->name}}">
                </div>
                @error('name')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror
                <div class="mb3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{$post->slug}}">
                </div>
                @error('slug')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror

                <div class="mb3">
                    <label for="">Decription</label>
                    <textarea name="description" id="mySummernote" rows="4" class="form-control">{!! $post->description !!}</textarea>
                </div>
                @error('description')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror
                <div class="mb3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" class="form-control" value="{{$post->yt_iframe}}">
                </div>
                @error('yt_iframe')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror
                <h4>SEO Tags</h4>
                <div class="mb3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{$post->meta_title}}">
                </div>
                @error('meta_title')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror
                <div class="mb3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" id="" rows="3" class="form-control">{!! $post->meta_description !!}</textarea>
                </div>
                @error('meta_description')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror
                <div class="mb3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keyword" id="" rows="3" class="form-control">{!! $post->meta_keyword !!}</textarea>
                </div>

                @error('meta_keyword')

                <div class="alert alert-warning">{{$message}}</div>

                @enderror

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" id="" class="" {{$post->status == 1 ? 'checked' : ''}}>
                        </div>
                    </div>

                    @error('status')

                    <div class="alert alert-warning">{{$message}}</div>

                    @enderror

                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </div>
                    </div>


            </form>
        </div>
    </div>
</div>
@endsection