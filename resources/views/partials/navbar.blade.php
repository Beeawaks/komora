<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-danger">
    <a class="navbar-brand {{ ($title === "Siap, Semangat, Dahsyat!") ? 'active' : '' }}" href="/">Komora</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Bulletin") ? 'active' : '' }}" href="/bulletin">Bulletin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Course") ? 'active' : '' }}" href="course">Course</a>
        </li>
      </ul>
    </div>
  </nav>