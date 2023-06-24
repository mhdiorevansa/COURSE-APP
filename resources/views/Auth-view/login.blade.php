@extends('Auth-view.layout.auth-layout')
@section('title', 'Login Account')

@section('content')
<div class="login d-flex flex-column align-items-center justify-content-center">
  @if (Session::has('status-login-fail'))
    <div class="col-lg-4 col-10">
      <div class="alert alert-danger text-center" role="alert">
        {{ Session::get('message-login-fail') }}
      </div>
    </div>
  @endif
  @if (Session::has('status-register'))
    <div class="col-lg-4 col-10">
      <div class="alert alert-success text-center" role="alert">
        {{ Session::get('message-register') }}
      </div>
    </div>
    @endif
  <div class="login-card col-lg-4 col-10 rounded p-lg-4 p-3">
    <h3 class="text-center mb-lg-4 mb-2">Login Account</h3>
    <form action="/login" autocomplete="off" method="post">
      @csrf
      <div class="mb-lg-3 mb-2">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Input your email" aria-describedby="helpId" required>
      </div>
      <div class="mb-lg-4 mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Input your password" aria-describedby="helpId" required>
      </div>
      <div class="mb-lg-3 mb-1">
        <button class="btn btn-login text-white w-100">Login</button>
      </div>
      <hr class="mt-lg-4 mb-lg-3">
      <p>Need an Account? <a href="/register">Sign Up</a></p>
    </form>
  </div>
</div>
@endsection