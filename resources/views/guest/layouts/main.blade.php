<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Oja') | Pecel Madiun Mbok Mi</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-4.6.1-dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bistro-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/settings.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/navigation.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.transitions.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/zerogrid.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }}">

  <link rel="shortcut icon" href="images/favicon.png">

  @stack('style')
</head>

<body>
<!--Loader-->
<div class="loader">
  <div class="cssload-container">
    <div class="cssload-circle"></div>
    <div class="cssload-circle"></div>
  </div>
</div>

<!--Topbar-->
<div class="topbar">
  @include('guest.layouts.topbar')
</div>

<!--Header-->
<header id="main-navigation">
  @include('guest.layouts.header')
</header>

<main>
  @yield('main-content')
</main>

<!-- Footer -->
<footer class="padding-top bg_black">
  @include('guest.layouts.footer')
</footer>

<a href="#" id="back-top"><i class="fa fa-angle-up fa-2x"></i></a>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('bootstrap-4.6.1-dist/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="js/jquery.themepunch.tools.min.js"></script>
<script src="js/jquery.themepunch.revolution.min.js"></script>
<script src="js/revolution.extension.layeranimation.min.js"></script>
<script src="js/revolution.extension.navigation.min.js"></script>
<script src="js/revolution.extension.parallax.min.js"></script>
<script src="js/revolution.extension.slideanims.min.js"></script>
<script src="js/revolution.extension.video.min.js"></script>
<script src="js/slider.js" type="text/javascript"></script>
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/jquery-countTo.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/functions.js" type="text/javascript"></script>

@stack('script')
</body>
</html>
