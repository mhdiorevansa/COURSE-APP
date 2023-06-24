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
  <title>My Profile</title>
  <style>
    .myprofile{
      min-height: 90vh;
    }
    .myprofile .card{
      box-shadow: 3px 3px 10px rgba(26, 25, 25, 0.164)
    }
    .button-edit{
      background-color:#19a7ce;
    }
    .button-edit:hover{
      background-color: #17a3ca;
    }
    .alert-cuy{
      margin-bottom: -0.5em;
    }
  </style>
</head>
<body>

  <div class="container pt-5 pt-lg-4">
    @if (session()->has('message'))
      <div class="col-lg-6 col-11 text-center mx-auto pt-lg-0 pt-0 alert-cuy">
        <div class="alert alert-success">{{ session()->get('message') }}</div>
      </div>
      @endif
    <div class="col-lg-6 col-11 mt-lg-5 mt-4 myprofile mx-auto my-auto mb-0">
      <div class="card bg-course-list">
        <div class="card-body d-flex flex-column align-items-center py-lg-4 py-4">
          @if(Auth::user()->gambar != '')
          <img src="{{ asset('storage/image/change-profile/' . auth()->user()->gambar) }}" class="rounded-circle" alt="" width="134px" height="134px" class="mt-3">
          @else
          <img src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt="gambar" width="134px" height="134px" class="mt-3">
          @endif
          <h3 class="mt-4">{{ $user->username }}</h3>
          <h5>{{ $user->email }}</h5>
          @if(Auth::user()->skor != '')
          <h5>skor: {{ $user->skor }}</h5>
          @else
          <h5>skor: 0</h5>
          @endif
          <figure class="text-center mt-3">
            <blockquote class="blockquote">
              @if(Auth::user()->bio != '')
              <q><i>{{ $user->bio }}</i></q>
              @else
              <q><i>belum ada bio</i></q>
              @endif
            </blockquote>
            <figcaption class="blockquote-footer">
              <cite title="Source Title">{{ $user->username }}</cite>
            </figcaption>
          </figure>
          <div class="link d-flex gap-3 mb-2">
            <a href="/" class="btn btn-secondary">Kembali</a>
            <a href="/edit-profile" class="btn button-edit text-white">Edit Profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/4225da578e.js" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
  @stack('scriptjs')
  </body>
  </html>