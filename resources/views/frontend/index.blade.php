@extends('frontend.inc.master')

@section('title', 'UrbanCube Blog')

@section('content')

<!-- blog-home7-->
<section class="blog blog-home7 ">
    <div class="container-wrap2">
        <div class="owl-carousel">
            <!--post-1-->
            @foreach($slider_post as $slider_post_item)
            <div class="post-overly post-overly-2">
                <div class="post-overly-image">
                    <img src="{{url('admin/uploads/articles/'.$slider_post_item->image)}}" alt="">
                </div>
                <div class="post-overly-content">
                    <div class="entry-cat">
                        <a href="blog-layout-1.html" class="category-style-2">{{$slider_post_item->category->name}}</a>
                    </div>
                    <h4 class="entry-title">
                        <a href="post-single.html">{{$slider_post_item->name}} </a>
                    </h4>
                    <ul class="entry-meta">
                        <li class="post-author"> <a href="author.html">{{$slider_post_item->author->name}}</a></li>
                        <li class="post-date"> <span class="line"></span> {{$slider_post_item->created_at->format('M j, Y')}}</li>
                    </ul>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>

<!--ads-->
<div class="ads mb-50">
    <div class="container-wrap2">
        <div class="row">
            <div class="col-lg-12">
                <div class="image">
                    <img src="{{asset('frontend/assets/img/ads/ads.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Layout-2-->
<section class="blog-layout-2 blog-layout-7">
    <div class="container-wrap2">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="section-title">
                    <h3>Latest Post </h3>
                    <!-- <p>Discover the most outstanding articles in all topics .</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--post 1-->
                @foreach($latest_post as $latest_post_item)
                <div class="post-list post-list-style7">
                    <div class="post-list-image">
                        <a href="post-single.html">
                            <img src="{{url('admin/uploads/articles/'.$latest_post_item->image)}}" alt="">
                        </a>
                    </div>
                    <div class="post-list-content text-center">
                        <h3 class="entry-title">
                            <a href="{{url('category/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}">{{$latest_post_item->name}}</a>
                        </h3>
                        <ul class="entry-meta">
                            <li class="post-author-img"><img src="{{asset('frontend/assets/img/author/1.jpg')}}" alt=""></li>
                            <li class="post-author"> <a href="#">{{$latest_post_item->author->name}}</a></li>
                            <li class="entry-cat"> <a href="{{url('category/'.$latest_post_item->category->slug)}}" class="category-style-1 "> <span class="line"></span> {{$latest_post_item->category->name}}</a></li>
                            <li class="post-date"> <span class="line"></span> {{$latest_post_item->created_at->format('M j, Y')}}</li>
                        </ul>
                        <div class="post-exerpt">
                            <p>{!! Str::limit($latest_post_item->description, 600) !!}</p>
                        </div>
                        <div class="post-btn">
                            <a href="{{url('category/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>

@if($latest_post->isNotEmpty())
<!--pagination-->
<div class="pagination">
    <div class="container-wrap2">
        <div class="pagination-area ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-list">
                        <ul class="list-inline">
                            @if($latest_post->currentPage() >1)
                            <li><a href="{{$latest_post->previousPageUrl()}}"><i class="las la-arrow-left"></i></a></li>
                            @endif

                            @for($i=1; $i<=$latest_post->lastPage(); $i++)
                                <li><a href="{{$latest_post->url($i)}}" class="{{$i == $latest_post->currentPage() ? 'active': ''}}">{{$i}}</a></li>
                                @endfor

                                @if($latest_post->hasMorePages())
                                <li><a href="{{$latest_post->nextPageUrl()}}"><i class="las la-arrow-right"></i></a></li>
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