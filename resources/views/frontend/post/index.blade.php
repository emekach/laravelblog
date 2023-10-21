@extends('frontend.inc.master')

@section('title', "$category->meta_title")
@section('meta_description', "$category->meta_description")
@section('meta_keyword' , "$category->meta_keyword")


@section('content')


<!--section-heading-->
<div class="section-heading ">
    <div class="container-fluid">
        <div class="section-heading-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading-2-title">
                        <h1>{{$category->name}}</h1>
                        <p class="links"><a href="{{route('frontend.home')}}">Home <i class="las la-angle-right"></i></a> Blog</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Blog Layout-2-->
<section class="blog-layout-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--post 1-->
                @if($post->isNotEmpty())
                @foreach($post as $item)
                <div class="post-list post-list-style2">
                    <div class="post-list-image">
                        <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                            <img src="{{url('admin/uploads/articles/'.$item->image)}}" alt="">
                        </a>
                    </div>
                    <div class="post-list-content">
                        <h3 class="entry-title">
                            <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">{{$item->name}}</a>
                        </h3>
                        <ul class="entry-meta">
                            <li class="post-author-img"><img src="{{asset('frontend/assets/img/author/1.jpg')}}" alt=""></li>
                            <li class="post-author"> <a href="author.html">{{$item->author->name}}</a></li>
                            <li class="entry-cat"> <a href="{{url('category/'.$category->slug)}}" class="category-style-1 "> <span class="line"></span> {{$item->category->name}}</a></li>
                            <li class="post-date"> <span class="line"></span> {{$item->created_at->format('M j, Y')}}</li>
                        </ul>
                        <div class="post-exerpt">
                            <p>{!! Str::limit($item->description, 550) !!}

                            </p>
                        </div>
                        <div class="post-btn">
                            <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

                @else

                <div class="post-list post-list-style2">
                    <h1>No Post Found</h1>
                </div>

                @endif




            </div>



        </div>
    </div>
</section>
@if($post->isNotEmpty())
<div class="pagination">
    <div class="container-fluid">
        <div class="pagination-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-list">
                        <ul class="list-inline">
                            @if ($post->currentPage() > 1)
                            <li><a href="{{ $post->previousPageUrl() }}"><i class="las la-arrow-left"></i></a></li>
                            @endif

                            @for ($i = 1; $i <= $post->lastPage(); $i++)
                                <li><a href="{{ $post->url($i) }}" class="{{ $i == $post->currentPage() ? 'active' : '' }}">{{ $i }}</a></li>
                                @endfor

                                @if ($post->hasMorePages())
                                <li><a href="{{ $post->nextPageUrl() }}"><i class="las la-arrow-right"></i></a></li>
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

@endsection