<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Login Admin') | Pecel Madiun Mbok Mi</title>

  {{-- Boostrap CSS 4.6 --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-4.6.1-dist/css/bootstrap.min.css') }}">
  {{-- Font Awesome --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Style CSS -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-6 col-xl-4">

        <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>

        @if (session()->has('status') && session()->has('message'))
          <div class="alert alert-{{session()->get('status')}} alert-dismissible fade show" role="alert">
            <span>{!! session()->get('message') !!}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <form action="{{ route('guest.login.post') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" value="fauzafirdhan@gmail.com" name="email"
                   class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                   aria-describedby="emailHelp">

            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" value="password" name="password" class="form-control" id="inputPassword">
          </div>

          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<footer>
  <div class="container">
    <p class="mt-5 mb-3 text-center text-muted">&copy; Fauza–2022</p>
  </div>
</footer>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('bootstrap-4.6.1-dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>

