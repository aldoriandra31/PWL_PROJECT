<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  @auth  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  @endauth

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @auth
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"
          style="left: inherit; right: 0px;">
          <a onclick="event.preventDefault();document.getElementById('logout').submit()" class="dropdown-item" href="#"
            data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
          <form action="{{ route('logout') }}" method="post" id="logout">
            @csrf
          </form>
        </div>
      </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Register</span>
      </a>
    </li>
    @endauth
  </ul>
</nav>
