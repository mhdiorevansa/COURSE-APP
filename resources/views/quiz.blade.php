@section('title','Quiz')
@extends('layout.main-layout')

@section('content')
 <div class="container-fluid quiz">
  <div class="col-lg-7 mx-auto py-5">
  <div class="card p-3">
    <div class="card-body text-center">
      <h2>Quiz</h2>
      <p>Pada halaman ini, anda akan mengakses halaman quiz. Pastikan anda sudah mempelajari semua kelas dan materi yang sudah disediakan. <span class="text-danger"><b>Ketika anda mengakses halaman quiz, skor anda akan di-reset menjadi 0</b></span>, ingin tetap lanjut?</p>
      <form action="{{ route('quiz.reset-score') }}" method="POST">
        @csrf
        <button class="btn text-white" type="submit">Lanjut Quiz</button>
      </form>
    </div>
  </div>
  </div>
 </div>
@endsection