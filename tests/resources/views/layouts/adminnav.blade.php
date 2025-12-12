<nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      @auth('admin')
      <ul class="navbar-nav side-nav">
        <li class="nav-item">
          <a class="nav-link text-white" style="margin-left: 20px;" href="{{ route('admins.dashboard') }}">
            Home <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-left: 20px;" href="{{ route('adminlist') }}">Admins</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-left: 20px;" href="{{ route('admincountry') }}">Countries</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-left: 20px;" href="{{ route ('show.city') }}">City</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-left: 20px;" href="{{ route('booking.admin') }}">Bookings</a>
        </li>
      </ul>
      @endauth

      <ul class="navbar-nav ml-md-auto d-md-flex">
        @auth('admin')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::guard('admin')->user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.go') }}">Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
