<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Halaman | {{ $title }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>

  <!-- Style CSS -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>

<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
      <form action="/register" method="post">
        @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid" @enderror id="name"
                 placeholder="Name" required value="{{ old('name') }}">
          <label for="name">Name</label>
          @error('name')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username') is-invalid" @enderror id="username"
                 placeholder="Username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid" @enderror id="email"
                 placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid"
                 @enderror id="password"
                 placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; Fauza–2022</p>
      </form>
      <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
    </main>
  </div>
</div>

</body>
</html>
