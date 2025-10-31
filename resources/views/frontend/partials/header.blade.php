<header id="header" class="header d-flex align-items-center sticky-top bg-light shadow-sm">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
      <!-- <img src="assets/img/logo.webp" alt=""> -->
      <h1 class="sitename m-0">SmartScience</h1>
    </a>

    <!-- Navigation Menu -->
    <nav id="navmenu" class="navmenu d-flex align-items-center">
      <ul class="d-flex align-items-center mb-0 list-unstyled">
        <li><a href="{{ url('/') }}" class="active">Home</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/courses') }}">Courses</a></li>
        <li class="dropdown position-relative">
          <a href="#" class="d-flex align-items-center">
            <span>Dropdown</span>
            <i class="bi bi-chevron-down toggle-dropdown ms-1"></i>
          </a>
          <ul class="dropdown-menu position-absolute">
            <li><a href="#" class="dropdown-item">Dropdown 1</a></li>
            <li class="dropdown-submenu">
              <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                Deep Dropdown <i class="bi bi-chevron-right"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" class="dropdown-item">Deep Dropdown 1</a></li>
                <li><a href="#" class="dropdown-item">Deep Dropdown 2</a></li>
                <li><a href="#" class="dropdown-item">Deep Dropdown 3</a></li>
                <li><a href="#" class="dropdown-item">Deep Dropdown 4</a></li>
                <li><a href="#" class="dropdown-item">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#" class="dropdown-item">Dropdown 2</a></li>
            <li><a href="#" class="dropdown-item">Dropdown 3</a></li>
            <li><a href="#" class="dropdown-item">Dropdown 4</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list ms-3"></i>
    </nav>

    <!-- Logout Button -->
    <div class="ms-4">
      @if (Auth::check())
      <a class="btn btn-warning" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
      </a>

      <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
      </form>
      @else
      <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
      @endif
    </div>

  </div>
</header>