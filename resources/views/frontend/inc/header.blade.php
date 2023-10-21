 <!-- Header-->
 <header class="header navbar-expand-lg fixed-top ">
     <div class="container-wrap2 ">
         <div class="header-area header-padding2">
             <!--logo-->
             <div class="logo">
                 <a href="{{route('frontend.home')}}">
                     <!-- <img src="{{asset('frontend/assets/img/logo/logo-dark.png')}}" alt="" class="logo-dark">
                     <img src="{{asset('frontend/assets/img/logo/logo-white.png')}}" alt="" class="logo-white"> -->

                     <h3>UrbanCube</h3>
                 </a>
             </div>
             <!--/-->
             <div class="header-navbar">
                 <nav class="navbar">
                     <!--navbar-collapse-->
                     <div class="collapse navbar-collapse" id="main_nav">
                         <ul class="navbar-nav ">
                             <!-- <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle active" href="index.html" data-toggle="dropdown"> Home </a>
                                 <ul class="dropdown-menu fade-up">
                                     <li>
                                         <a class="dropdown-item " href="index.html">Home 1</a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item" href="index-2.html">Home 2 </a>
                                     </li>


                                 </ul>
                             </li>
 -->


                             <li class="nav-item">
                                 <a class="nav-link" href="{{route('frontend.home')}}"> Home </a>
                             </li>



                             @php

                             $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();

                             @endphp

                             @foreach($categories as $catitem)

                             <li class="nav-item">
                                 <a class="nav-link" href="{{url('category/'.$catitem->slug)}}"> {{$catitem->name}} </a>
                             </li>

                             @endforeach

                         </ul>
                     </div>
                     <!--/-->
                 </nav>
             </div>

             <!--header-right-->
             <div class="header-right ">
                 <!--theme-switch-->
                 <div class="theme-switch-wrapper">
                     <label class="theme-switch" for="checkbox">
                         <input type="checkbox" id="checkbox" />
                         <span class="slider round ">
                             <i class="lar la-sun icon-light"></i>
                             <i class="lar la-moon icon-dark"></i>
                         </span>
                     </label>
                 </div>

                 <!--search-icon-->
                 <div class="search-icon">
                     <i class="las la-search"></i>
                 </div>

                 <!--button-subscribe-->
                 <div class="botton-sub">
                     <a href="signup.html" class="btn-subscribe">subscribe</a>
                 </div>
                 <!--navbar-toggler-->
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <!--/-->
             </div>
         </div>
     </div>
 </header>