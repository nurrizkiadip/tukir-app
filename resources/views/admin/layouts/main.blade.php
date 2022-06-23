<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>@yield('title', 'TUKIR MAN') | Oja Blog</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('bootstrap-4.6.1-dist/css/bootstrap.min.css') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Custom styles for this template -->
  <link href="{{ asset('dashboard/dashboard.css') }}" rel="stylesheet">

  <style>
    main .content-header {
      padding-block: 1rem;
    }

    main .content {
      padding-block-end: 2rem;
    }
  </style>

  @stack('style')
</head>
<body>
{{-- Memasukan partial header  --}}
<header>
  @include('admin.layouts.header')
</header>

<main class="container-fluid">
  {{-- Memasukkan partial seidebar --}}
  @include('admin.layouts.sidebar')

  <div class="content-header col-md-9 ml-sm-auto col-lg-10 px-md-4">
    @yield('header-content')
  </div>

  <div role="main" class="content col-md-9 ml-sm-auto col-lg-10 px-md-4">
    @yield('main-content')
  </div>
</main>

{{-- Sumber eksternal javascript --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

@stack('script')
</body>
</html>
