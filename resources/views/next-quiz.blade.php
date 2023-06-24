@section('title','Quiz')
@extends('layout.main-layout')

@section('content')
 <div class="container-fluid quiz">
  <div class="col-lg-7 mx-auto py-5">
  <div class="card p-3">
    <div class="card-body text-start">
      <form action="/quiz/check" method="POST" autocomplete="off">
        @csrf
        <h3 class="mb-3">{{ $quiz->pertanyaan }}</h3>
        <input type="hidden" name="id_quiz" value="{{ $quiz->id_quiz }}">
        <input type="text" class="form-control py-2" name="jawaban" placeholder="Jawaban anda" required>
        <button class="btn text-white mt-3" type="submit">Kirim jawaban</button>
      </form>
    </div>
  </div>
  </div>
 </div>
@endsection