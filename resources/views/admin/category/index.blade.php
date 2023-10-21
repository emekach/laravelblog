@extends('admin.includes.admin_master')

@section('title', 'Categories')

@section('admin')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.delete_category')}}" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category with its post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_delete_id" id="category_id">
                    <h5>Are you sure you want to delete this Category with all its posts. ? </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal end -->

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
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($category->isEmpty())

                    @else

                    @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><img src="{{asset('admin/uploads/category/'.$item->image)}}" alt="" width="50px" height="50px"></td>

                        <td>{{$item->status == '1' ? 'Hidden': 'Shown' }}</td>
                        <td>
                            <a href="{{route('admin.edit_category',['category_id'=>$item->id])}}" class="btn btn-success">Edit</a>

                            <!-- <a href="{{route('admin.delete_category',['category_id'=>$item->id])}}" class="btn btn-danger">Delete</a> -->

                            <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{$item->id}}">Delete</button>
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

@section('scripts')
<script>
    $(document).ready(function() {
        // $('.deleteCategoryBtn').click(function(e) {
        $(document).on('click', '.deleteCategoryBtn', function(e) {

            // });
            e.preventDefault();

            var category_id = $(this).val();
            $("#category_id").val(category_id);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endsection