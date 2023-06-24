@section('title','Edit Kelas')
@extends('Admin.layout.admin-layout')

@section('content')
<div class="app-wrapper mb-3">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="text-center mb-4">Edit kelas</h1>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="/update-kelas/{{ $editKelas->id_kelas }}" enctype="multipart/form-data" autocomplete="off" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group mb-3">
          <label for="" class="mb-2 form-label">Nama Kelas</label><br>
          <input type="text" class="form-control p-3 border-2" placeholder="Masukkan nama kelas" name="nama_kelas" required" value="{{ $editKelas->nama_kelas }}">
        </div>
        <div class="form-group mb-3">
          <label for="" class="mb-2 form-label">Deskripsi Kelas</label><br>
          <textarea class="form-control border-2" placeholder="Masukkan deskripsi kelas" id="floatingTextarea2" style="height: 100px" name="deskripsi_kelas" required>{{ $editKelas->deskripsi_kelas }}</textarea>
        </div>
        <div class="form-group mb-3">
          <label for="" class="mb-2 form-label">Tentang Kelas</label><br>
          <textarea placeholder="Masukkan tentang kelas" name="tentang_kelas" id="tentangkelas">{{ $editKelas->tentang_kelas }}</textarea>
        </div>
        <div class="form-group mb-3">
          <label for="" class="mb-2 form-label">Persiapan Kelas</label><br>
          <textarea placeholder="Masukkan persiapan kelas" name="persiapan_kelas" id="persiapankelas">{{ $editKelas->persiapan_kelas }}</textarea>
        </div>
        <div class="form-group mb-4">
          <label for="formFile" class="form-label">Upload gambar kelas</label>
          <input class="form-control border-2 mb-3" type="file" id="formFile" name="photo" id="gambar_kelas">
          @if ($editKelas->gambar_kelas)
            <p>File yang diunggah sebelumnya: {{ $editKelas->gambar_kelas }}</p>
          @endif
          <label for="" class="form-label mt-0 mb-0 text-danger"><i>disarankan gambar berukuran 184 x 184</i></label>
        </div>

        <button class="btn btn-primary mb-lg-0 mb-5" type="submit">Update Kelas</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scriptjs')
<script>
  ClassicEditor
    .create( document.querySelector( '#tentangkelas' ),{
      ckfinder:{
        uploadUrl: '{{ route('ckeditor.upload').'?_token='.csrf_token() }}'
      }
    } )
    .catch( error => {
      console.error( error );
    } );  
</script>
<script>
  ClassicEditor
    .create( document.querySelector( '#persiapankelas' ),{
      ckfinder:{
        uploadUrl: '{{ route('ckeditor.upload').'?_token='.csrf_token() }}'
      }
    } )
    .catch( error => {
      console.error( error );
    } );  
</script>
@endpush