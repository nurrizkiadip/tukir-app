{{-- Partial bagian sidebar --}}
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-home mr-1"></i>Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.event*') ? 'active' : '' }}" href="{{ route('admin.event.index') }}">
          <i class="fas fa-calendar-alt mr-1"></i>Event
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.menu*') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}">
          <i class="fas fa-shopping-cart mr-1"></i>Menus
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.testimonial*') ? 'active' : '' }}" href="{{ route('admin.testimonial.index') }}">
          <i class="fas fa-comment mr-1"></i>Testimoni
        </a>
      </li>
      <li class="nav-item">
        <form action="{{ route('admin.logout') }}" class="d-none" method="POST">
          @csrf
        </form>
        <a class="nav-link" href="{{ route('admin.logout') }}"
          onclick="event.preventDefault();event.target.previousElementSibling.submit();"
        ><i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
