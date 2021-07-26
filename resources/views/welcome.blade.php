<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>የአሚኮ ዕለት ስርጭት ማስፈፀሚያ ሲሰተም </title>

    <!-- Favicon-->

    <link rel="icon" type="image/x-icon" href="{{asset('logo-image/amico.jpg')}}"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
          rel="stylesheet" type="text/css"/>
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
          rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('welcome-page/css/styles.css')}}" rel="stylesheet"/>
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/home') }}" style="font-size: 30px;color: #2b00ff">አ ሚ ኮ </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    </div>
    @if (Route::has('login'))
        <div class="top-right links ">
            @auth
                <a href="{{ url('/home') }}" style="font-size: 25px;color: #2b00ff">ወደ ዋናው ገጽ ግባ</a>
            @else
                <a href="{{ route('login') }}" style="font-size: 25px;color: #2b00ff">ግ ባ</a>
            @endauth
        </div>
    @endif
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container h-90">
        <div class="row h-90 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end" id="app">
                <h1 v-if="show" class="text-uppercase text-white  font-weight-bold" style="color: #ffffff">የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                    መርሐ ግብር</h1>
                <hr class="divider my-3"/>
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light"></p>
                <a class="btn btn-primary btn-xl js-scroll-trigger"
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" style="font-size: 25px;color: #2b00ff">ወደ ዋናው ገጽ ግባ </a>
                    @else
                        <a href="{{ route('login') }}"
                           style="font-size: 35px ;width: 150px ;padding-top: 1px;padding-bottom: 1px;color: #2b00ff">ግ ባ</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>
<!-- Footer-->
<footer class="bg-light py-4">
    <div class="container">
        <div class="small text-center text-muted">Copyright © 2013 - Challelign Tilahun</div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
{{--<script src="js/scripts.js"></script>--}}
</body>
</html>
