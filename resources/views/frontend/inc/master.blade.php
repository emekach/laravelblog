<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{asset('frontend/assets/img/favicon.png')}}">

    <!-- Title -->
    <title> @yield('title') </title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">

    <meta name="author" content="Urban CUbe">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">

    <!-- main style -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">
</head>

<body>
    <!--loading -->
    <div class="loader">
        <div class="loader-element"></div>
    </div>

    @include('frontend.inc.header')

    @yield('content')

    @include('frontend.inc.footer')

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

    <!-- JS Plugins  -->
    <script src="{{asset('frontend/assets/js/theia-sticky-sidebar.js')}}"></script>
    <script src="{{asset('frontend/assets/js/ajax-contact.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/switch.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.marquee.js')}}"></script>

    <!-- JS main  -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>


</html>