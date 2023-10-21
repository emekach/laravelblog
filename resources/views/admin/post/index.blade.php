@extends('admin.includes.admin_master')

@section('title', 'Blog Posts')

@section('admin')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.delete_post')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="delete_post_id" id="post_id">
                    <h5>Are you sure you want to delete this post?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end modal -->

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

                            <!-- <a href="{{route('admin.delete_post',['post_id'=>$item->id])}}" class="btn btn-danger">Delete</a> -->
                            <button type="button" class="btn btn-danger deletePost" value="{{$item->id}}">Delete</button>
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

@section('post_script')
<script>
    $(document).ready(function() {
        $(document).on('click', '.deletePost', function(e) {

            e.preventDefault();

            var post_id = $(this).val();
            $("#post_id").val(post_id)

            $("#deleteModal").modal('show');
        });
    });
</script>
@endsection