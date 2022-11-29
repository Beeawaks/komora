<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container">  
    <a class="navbar-brand fw-bold" href="/">Komora</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "bulletin") ? 'active' : '' }}" href="/bulletin">Bulletin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "course") ? 'active' : '' }}" href="/course">Course</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
        </ul> --}}

        

       

      </div>
      <ul class="navbar-nav ml-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        @else
        <li class="nav-item">
          <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}">Login</a>
        </li>
        @endauth
      </ul>
  </div>
</nav>