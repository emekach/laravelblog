@extends('admin.includes.admin_master')

@section('title', 'Categories')

@section('admin')
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>

    @if(Session::has('error'))
    <div class="alert alert-success">{{session::get('error')}}</div>
    @endif
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Category</li>
    </ol>
    <div class="row">

    </div>
</div>
@endsection