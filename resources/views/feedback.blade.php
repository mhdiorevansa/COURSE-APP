@section('title','Feedback')
@extends('layout.main-layout')

@section('content')
 <div class="container-fluid quiz">
  <div class="col-lg-7 mx-auto py-5">
  <div class="card p-3">
    <div class="card-body text-center">
      <h2>Feedback</h2>
      <p>Berikan feedback selama anda belajar di GROWSI</p>
      <form method="POST" action="/feedback" autocomplete="off">
        @csrf
        <input type="hidden" name="user_id">
        <textarea name="isi_feedback" class="form-control mb-4"></textarea>
        <button class="btn text-white" type="submit">Kirim Feedback</button>
      </form>
    </div>
  </div>
  </div>
 </div>
@endsection