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
  <title>Edit Profile</title>
  <style>
    .myprofile{
      min-height: 100vh;
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
    .email{
      cursor: no-drop;
    }
    h1{
      color: #19a7ce;
      font-weight: 600;
      font-size: 50px;
      margin-bottom: -2rem;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1 class="text-center mt-4 mb-2">Edit Profile</h1><br>
    <div class="col-lg-6 col-11 myprofile mx-auto">
      <div class="card bg-course-list">
        <div class="card-body">
         <form action="{{ route('profile.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="col-12">
          <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" name="username" class="form-control w-100" value="{{ old('username', Auth::user()->username) }}">
            @error('username')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3" title="email tidak bisa diubah">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" class="form-control w-100 email" value="{{ old('email', Auth::user()->email) }}" disabled>
          </div>
          <div class="mb-3" title="email tidak bisa diubah">
            <label for="" class="form-label">Bio</label>
            <textarea name="bio" class="form-control h-50" placeholder="buat bio">{{ old('bio', Auth::user()->bio) }}</textarea>
          </div>
          <div class="form-group mb-4">
            <label for="formFile" class="form-label">Upload foto profile</label>
            <input class="form-control border-2 mb-3" type="file" id="formFile" name="photo" id="gambar_user" value="{{ old('username', Auth::user()->gambar) }}">
            @if (Auth::user()->gambar)
              <p>File yang diunggah sebelumnya: {{ Auth::user()->gambar }}</p>
            @endif
          </div>
          <div class="link d-flex gap-3 mb-2">
            <a href="/myprofile" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn button-edit text-white">Update Profile</button>
          </div>
          </div>
         </form>
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