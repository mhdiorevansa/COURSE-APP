@section('title','Hasil Quiz')
@extends('layout.main-layout')

@section('content')
 <div class="container-fluid quiz">
  <div class="col-lg-7 mx-auto py-5">
  <div class="card p-3">
    <div class="card-body text-start">
      <h3 class="mb-3">Hasil Quiz</h3>
      <p>Quiz anda telah selesai. hasil quiz yang didapatkan oleh <b>{{ Auth::user()->username }}</b> adalah sebanyak {{ Auth::user()->skor }} point</p>
      <a href="/ranking" class="btn text-white">Lihat ranking</a>
    </div>
  </div>
  </div>
 </div>
@endsection