@section('title','Tambah Quiz')
@extends('Admin.layout.admin-layout')

@section('content')
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="text-center mb-4">Edit Quiz</h1>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          </div>
      @endif
      <form action="/update-quiz/{{ $editQuiz->id_quiz }}" enctype="multipart/form-data" autocomplete="off" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group mb-3">
          <label for="" class="mb-2 form-label">Nama Kelas</label><br>
          <select class="form-select" aria-label="Default select example" name="kelas_id">
            <option value="{{ $editQuiz->kelas->id_kelas }}">{{ $editQuiz->kelas->nama_kelas}}</option>
            @foreach ($kelas as $item)
              <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="formFile" class="form-label">Pertanyaan</label><br>
          <textarea id="isipertanyaan" name="pertanyaan">{{ $editQuiz->pertanyaan }}</textarea>   
        </div>
        <div class="form-group mb-4">
          <label for="formFile" class="form-label"></label><br>
          <textarea id="isijawaban" name="jawaban">{{ $editQuiz->jawaban }}</textarea>   
        </div>
        <a href="/control-quiz" class="btn btn-secondary me-2">Kembali</a>
        <button class="btn btn-primary" type="submit">Update data</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scriptjs')
<script>
  ClassicEditor
    .create( document.querySelector( '#isijawaban' ),{
      ckfinder:{
        uploadUrl: '{{ route('ckeditor.uploadquiz').'?_token='.csrf_token() }}'
      }
    } )
    .catch( error => {
      console.error( error );
    } );  
</script>
<script>
  ClassicEditor
    .create( document.querySelector( '#isipertanyaan' ),{
      ckfinder:{
        uploadUrl: '{{ route('ckeditor.uploadquiz').'?_token='.csrf_token() }}'
      }
    } )
    .catch( error => {
      console.error( error );
    } );  
</script>
@endpush

