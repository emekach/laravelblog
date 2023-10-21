@extends('frontend.inc.master')

@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword")

@section('content')

<!--post-single-->
<section class="post-single">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-lg-12">
                <!--post-single-title-->
                <div class="post-single-body">
                    <div class="post-single-title">
                        <h2> {{$post->name}}</h2>
                        <div class="meta-social">
                            <ul class="entry-meta">
                                <li class="post-author-img"><img src="{{asset('frontend/assets/img/author/1.jpg')}}" alt=""></li>
                                <li class="post-author"> <a href="#">{{$post->author->name}}</a></li>
                                <li class="entry-cat"> <a href="{{url('category/'.$category->slug)}}" class="category-style-1"> <span class="line"></span> {{$post->category->name}}</a></li>
                                <li class="post-date"> <span class="line"></span> {{$post->created_at->format('M j, Y')}}</li>
                            </ul>
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li>
                                        <p>Share :</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--post-single-image-->
                <div class="post-single-image">
                    <img src="{{url('admin/uploads/articles/'.$post->image)}}" alt="" width="100%">
                </div>

                <div class="post-single-body">
                    <!--post-single-content-->
                    <div class="post-single-content">

                        {!! $post->description !!}




                    </div>

                    <!--post-single-bottom-->
                    <div class="post-single-bottom">
                        <div class="tags">
                            <p>Tags:</p>
                            <ul class="list-inline">
                                <li>
                                    <a href="blog-layout-2.html">brading</a>
                                </li>
                                <li>
                                    <a href="blog-layout-2.html">marketing</a>
                                </li>
                                <li>
                                    <a href="blog-layout-3.html">tips</a>
                                </li>
                                <li>
                                    <a href="blog-layout-4.html">design</a>
                                </li>
                                <li>
                                    <a href="blog-layout-5.html">business
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-media">
                            <p>Share on :</p>
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--post-single-author-->
                    <div class="post-single-author ">
                        <div class="authors-info">
                            <div class="image">
                                <a href="#" class="image">
                                    <img src="{{asset('frontend/assets/img/author/1.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h4>{{$post->author->name}}</h4>
                                <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                                    Quis sem justo nisi varius.
                                </p>
                                <div class="social-media">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--post-single-Related posts-->
                    <div class="post-single-next-previous">
                        <div class="row ">
                            <!--prevvious post-->
                            <div class="col-md-6">
                                <div class="small-post">
                                    <div class="small-post-image">
                                        <a href="post-single.html">
                                            <img src="assets/img/blog/1.jpg" alt="...">
                                        </a>
                                    </div>

                                    <div class="small-post-content">
                                        <small> <a href="post-single.html"> <i class="las la-arrow-left"></i>Previous post</a></small>

                                        <p>
                                            <a href="post-single.html">You can’t build a reputation on what you are going to do.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--/-->

                            <!--next post-->
                            <div class="col-md-6">
                                <div class="small-post">
                                    <div class="small-post-image">
                                        <a href="post-single.html">
                                            <img src="assets/img/blog/2.jpg" alt="...">
                                        </a>
                                    </div>

                                    <div class="small-post-content">
                                        <small> <a href="post-single.html">Next post <i class="las la-arrow-right"></i></a> </small>
                                        <p>
                                            <a href="post-single.html">Brand yourself for the career you want, not the job you have</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--/-->
                        </div>
                    </div>
                    <!--post-single-Ads-->
                    <div class="post-single-ads ">
                        <div class="ads">
                            <img src="assets/img/ads/ads.jpg" alt="">
                        </div>
                    </div>

                    <!--post-single-comments-->
                    <div class="post-single-comments">
                        <!--Comments-->
                        <h4>3 Comments</h4>
                        <ul class="comments">
                            <!--comment1-->
                            <li class="comment-item pt-0">
                                <img src="assets/img/other/user1.jpg" alt="">
                                <div class="content">
                                    <div class="meta">
                                        <ul class="list-inline">
                                            <li><a href="#">Nirmaine Nicole</a> </li>
                                            <li class="slash"></li>
                                            <li>3 Months Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                        quod non fugiat aliquid sit similique!
                                    </p>
                                    <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                </div>

                            </li>
                            <!--comment2-->
                            <li class="comment-item">
                                <img src="assets/img/other/use2.jpg" alt="">
                                <div class="content">
                                    <div class="meta">
                                        <ul class="list-inline">
                                            <li><a href="#">adam smith</a> </li>
                                            <li class="slash"></li>
                                            <li>3 Months Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                        quod non fugiat aliquid sit similique!
                                    </p>
                                    <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                </div>
                            </li>
                            <!--comment3-->
                            <li class="comment-item">
                                <img src="assets/img/other/user3.jpg" alt="">
                                <div class="content">
                                    <div class="meta">
                                        <ul class="list-inline">
                                            <li><a href="#">Emma david</a> </li>
                                            <li class="slash"></li>
                                            <li>3 Months Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                        quod non fugiat aliquid sit similique!
                                    </p>
                                    <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                </div>
                            </li>

                        </ul>
                        <!--Leave-comments-->
                        <div class="comments-form">
                            <h4>Leave a Reply</h4>
                            <!--form-->
                            <form class="form " action="#" method="POST" id="main_contact_form">
                                <p>Your email adress will not be published ,Requied fileds are marked*.</p>
                                <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                    Your message was sent successfully.
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-20">
                                            <input name="name" type="checkbox" value="1" required="required">
                                            <label for="name"><span>save my name , email and website in this browser for the next time I comment.</span></label>
                                        </div>

                                        <button type="submit" name="submit" class="btn-custom">
                                            Send Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!--/-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection