<div id="navigation" data-spy="affix" data-offset-top="20">
  <div class="container">
    <div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand py-2" href="{{ route('guest.home') }}">
            <img src="{{ asset('images/favicon.png') }}"
                 alt="Nasi Pecel Madiun Nyokap"
                 class="img-responsive"
                 height="50" width="50"
            >
          </a>
          <button
            class="navbar-toggler" type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="gap:1rem">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('guest.menu') }}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('guest.gallery') }}">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('guest.about') }}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('guest.faq') }}">FAQ</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
