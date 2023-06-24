<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  @vite([ "resources/css/style.css","resources/js/app.js"])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand ms-lg-5 me-lg-5" href="#">GrowSI</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-lp">
          <li class="nav-item ms-lg-5">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item me-lg-3 ms-lg-3">
            <a class="nav-link" href="/belajar">Belajar</a>
          </li>
          <li class="nav-item me-lg-3">
            <a class="nav-link" href="/forum">Forum</a>
          </li>
          <li class="nav-item me-lg-3">
            <a class="nav-link" href="/quiz">Quiz</a>
          </li>
          <li class="nav-item me-lg-3">
            <a class="nav-link" href="#">Ranking</a>
          </li>
        </ul>
        <div class="d-flex flex-lg-row flex-column me-lg-5 me-12" >
          @if(Auth::user())
          <div class="btn-group w-lg-0 w-25 dropdown-center">
            <button type="button" class="btn dropdown-toggle button-profile-lp d-lg-flex gap-1 align-items-lg-center" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              @if(Auth::user()->gambar != '')
                <img class="photo-profile-lp me-lg-1" src="{{ asset('storage/image/change-profile/' . Auth::user()->gambar) }}" alt="gambar">
              @else
                <img class="photo-profile-lp me-lg-1" src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt="gambar">
              @endif
              <div class="name-user">{{ Auth::user()->username }}</div>
            </button>
            <ul class="dropdown-menu dropdown-menu-center dropdown-menu-lg-center">
              <li><a class="dropdown-item" href="#" type="button">My profile</a></li>
              <li><a class="dropdown-item" href="/logout" type="button" id="logout" data-confirm-delete="true">Logout</a></li>
            </ul>
          </div>
            @else
            <a class="me-3 me-lg-3 btn btn-register mb-2 mb-lg-0" href="/register">Daftar</a>
            <a class="me-3 me-lg-3 btn btn-login mb-2 mb-lg-0" href="/login">Masuk</a> 
          @endif
        </div>
      </div>
    </div>
  </nav>


  <div class="mt-lg-5 mt-5 pt-lg-4 pt-4">
    @yield('content')
  </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/4225da578e.js" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
@stack('scriptjs')
</body>
</html>