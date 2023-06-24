@section('title','Buat pertanyaan')
@extends('layout.main-layout2')
@section('content')
  <div class="container-fluid px-lg-2">
    <div class="make-question ms-lg-5 ms-3 me-3 me-lg-5 mt-lg-4 mt-4">
      <h1 class="mb-lg-4 mb-4">Buat pertanyaan atau diskusi</h1>
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        </div>
      @endif
      <form action="/make-question" autocomplete="off" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="namaKelas" class="form-label">Nama Kelas</label>
          <select class="form-select" aria-label="Default select example" id="namaKelas" name="kelas_id">
            <option selected>Pilih Kelas</option>
            @foreach ($forum as $item)
              <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="judulPertanyaan" class="form-label">Judul pertanyaan</label>
          <input type="text" class="form-control" id="judulPertanyaan" placeholder="Tuliskan judul pertanyaan" name="judul_forum">
        </div>
        <div class="mb-3">
          <label for="isipertanyaan" class="form-label">Isi pertanyaan</label>
          <textarea id="isipertanyaan" name="pertanyaan_forum"></textarea>
        </div>
        <div class="mb-5 mt-4">
          <a href="/forum" class="btn btn-cancel rounded-0 me-3">Batalkan</a>
          <button type="submit" class="btn button-add rounded-0"><i class="bi bi-plus-lg"></i> Tambah Pertanyaan</button>
        </div>
      </form>
    </div>
  </div>
@endsection
@push('scriptjs')
<script>
  ClassicEditor
    .create( document.querySelector( '#isipertanyaan' ),{
      ckfinder:{
        uploadUrl: '{{ route('ckeditor.upload').'?_token='.csrf_token() }}'
      }
    } )
    .catch( error => {
      console.error( error );
    } );  
</script>
@endpush