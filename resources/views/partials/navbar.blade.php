<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-danger">
  <div class="container">  
    <a class="navbar-brand" href="/">Komora</a>
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
          <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
        </ul>
      </div>
  </div>
</nav>