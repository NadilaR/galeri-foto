<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/">Galeri Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Foto</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link {{ ($active === "dashboard") ? 'active' : '' }}" href="/dashboard">Galeri Saya</a>
          </li>
          @endauth
        </ul>
        <ul class="navbar-nav ms-auto">
        @guest
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login | Register</a>
          </li>
        @endguest
        @auth
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-left"></i> Logout</button>
            </form>                 
        @endauth
        </ul>
      </div>
    </div>
  </nav>