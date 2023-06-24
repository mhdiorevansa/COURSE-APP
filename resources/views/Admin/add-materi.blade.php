@section('title','tambah materi')
@extends('Admin.layout.admin-layout')

@section('content')
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="text-center mb-4">Tambah Materi</h1>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          </div>
      @endif
      <form action="/add-materi" enctype="multipart/form-data" autocomplete="off" method="POST">
        @csrf
        <div class="form-group mb-3">
          <label for="" class="mb-2 form-label">Judul Materi</label><br>
          <input type="text" class="form-control p-3 border-2" placeholder="Masukkan judul materi" name="judul_materi">
        </div>
        <div class="form-group mb-3">
          <label for="" class="mb-2 form-label">Nama Kelas</label><br>
          <select class="form-select" aria-label="Default select example" name="kelas_id">
            <option selected>Pilih Kelas</option>
            @foreach ($addMateri as $item)
              <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-4">
          <label for="formFile" class="form-label">Isi Materi</label><br>
          <textarea id="isimateri" name="isi_materi"></textarea>   
        </div>
        <button class="btn btn-primary" type="submit">Tambah data</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scriptjs')
<script>
  ClassicEditor
    .create( document.querySelector( '#isimateri' ),{
      ckfinder:{
        uploadUrl: '{{ route('ckeditor.uploadquiz').'?_token='.csrf_token() }}'
      }
    } )
    .catch( error => {
      console.error( error );
    } );  
</script>
@endpush

