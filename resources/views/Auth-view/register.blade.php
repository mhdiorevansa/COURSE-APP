@extends('Auth-view.layout.auth-layout')
@section('title','Register Account')

@section('content')
<div class="register d-flex flex-column align-items-center justify-content-center">
    @if ($errors->any())
    <div class="col-lg-4 col-10 mt-lg-3 mb-lg-2">
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
    @endif

  <div class="register-card col-lg-4 col-10 rounded px-lg-4 pt-lg-4 px-3 pt-3">
    <h3 class="text-center mb-lg-4 mb-3 mt-2">Register Account</h3>
    <form action="/register" autocomplete="off" method="post">
      @csrf
      <div class="mb-lg-3 mb-2">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Input your username" aria-describedby="helpId" required>
      </div>
      <div class="mb-lg-3 mb-2">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Input your email" aria-describedby="helpId" required>
      </div>
      <div class="mb-lg-4 mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Input your password" aria-describedby="helpId" required>
      </div>
      <div class="mb-lg-3 mb-1">
        <button class="btn btn-login text-white w-100" type="submit">Register</button>
      </div>
      <hr class="mt-lg-4 mb-lg-3">
      <p  class="mb-lg-4 mb-4">Already a user? <a href="/login">Login</a></p>
    </form>
  </div>
</div>
@endsection