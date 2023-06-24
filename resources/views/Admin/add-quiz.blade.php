@section('title','Tambah Quiz')
@extends('Admin.layout.admin-layout')

@section('content')
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="text-center mb-4">Tambah Quiz</h1>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          </div>
      @endif
      <form action="/add-quiz" enctype="multipart/form-data" autocomplete="off" method="POST">
        @csrf
        <div class="form-group mb-3">
          <label for="formFile" class="form-label">Pertanyaan</label><br>
          <textarea id="isipertanyaan" name="pertanyaan" class="form-control h-75"></textarea>   
        </div class="form-group mb-3">
          <label for="formFile" class="form-label">Jawaban</label><br>
          <textarea name="jawaban" class="form-control h-75"></textarea>
        </div>
        <button class="btn btn-primary mt-3 ms-3" type="submit">Tambah data</button>
      </form>
    </div>
  </div>
</div>
@endsection


