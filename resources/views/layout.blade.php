<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ecommerce Bundle | @yield('title', '')</title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"> -->


            <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/webeasty/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- CSS Files For Plugin -->
    
    <link href="{{ asset('css/webeasty/animate.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/webeasty/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/webeasty/magnific-popup.css') }}" rel="stylesheet" />

    
    <link href="{{ asset('css/webeasty/YTPlayer.css') }}" rel="stylesheet" />
    
    <!-- Custom CSS -->
    
    <link href="{{ asset('css/webeasty/style.css') }}" rel="stylesheet">

        @yield('extra-css')
    </head>


<!-- <body class="@yield('body-class', '')" > -->

<body class="" >



    @include('layouts.header')

    @yield('content')

    

    @yield('extra-js')



    
     <!-- Start Footer -->
     <footer class="site-footer">
        <div class="container">
            <small class="copyright pull-left">Copyrights © 2023 All Rights Reserved By <a href="https://shreeagt.com/">Shree AGT Multimedia</a>.</small>
            <div class="social-icon pull-right">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-google"></i></a>
                <a href="#"><i class="fa fa-rss"></i></a>
                <a href="#"><i class="fa fa-globe"></i></a>
            </div>
            <!-- /social-icon -->
        </div>
        <!-- /container -->
    </footer>
    <!-- End Footer -->


    <!-- Back to top -->
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
    <!-- /Back to top -->

    
    <!-- jQuery -->

   
    <script src="{{asset('js/webeasty/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/webeasty/bootstrap.min.js') }}"></script>
    
    <!-- Components Plugin -->
   
    <script src=" {{ asset('js/webeasty/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/webeasty/smooth-scroll.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.stellar.min.js') }}"></script>  
    <script src="{{ asset('js/webeasty/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/webeasty/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/webeasty/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{asset('js/webeasty/retina.min.js')}}"></script>
    <script src="{{ asset('js/webeasty/wow.min.js') }}"></script>
    <script src="{{ asset('js/webeasty/owl.carousel.min.js') }}"></script>
    
    <!-- Custom Plugin -->
    
    <script src="{{ asset('js/webeasty/custom.js') }}"></script>

</body>
</html>
