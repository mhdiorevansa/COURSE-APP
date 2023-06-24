@section('title','Code Test')
@extends('layout.main-layout')

@section('content')
  <div class="container-fluid code-testing py-4">
    <h2 class="ms-lg-5">Coba Code Editor</h2>
    <div class="code-editor ms-lg-5 me-lg-5 mt-lg-3 ps-lg-2">
      <div class="left">
        <label class="mb-2"><i class="fa-brands fa-html5"></i> HTML</label>
        <textarea id="htmlCode" class="mb-2" oninput="showPreview()"></textarea>
        <label class="mb-2"><i class="fa-brands fa-css3-alt"></i> CSS</label>
        <textarea id="cssCode" class="mb-2" oninput="showPreview()"></textarea>
        <label class="mb-2"><i class="fa-brands fa-js"></i> JavaScript</label>
        <textarea id="jsCode" class="mb-2" oninput="showPreview()"></textarea>
      </div>
      <div class="right">
        <label><i class="fa-solid fa-play"></i> Output</label>
        <iframe id="preview-window" class="text-white"></iframe>
      </div>
    </div>

    <a href="/materi-detail/{{ $materi->id_materi }}" class="btn btn-login ms-lg-5 ms-2 me-lg-5 me-2">Kembali</a>
  </div>

  <div class="bg-course-list">
    <footer class="py-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="/belajar" class="nav-link px-2 text-muted">Belajar</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Forum</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Ranking</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2023 IS Application Project, Sistem Informasi</p>
    </footer>
  </div>

  <script type="text/javascript">
    function showPreview(){
      var htmlCode = document.getElementById("htmlCode").value;
      var cssCode = "<style>"+document.getElementById("cssCode").value+"</style>";
      var jsCode = "<scri"+"pt>"+document.getElementById("jsCode").value+"</scri"+"pt>";
      var frame = document.getElementById("preview-window").contentWindow.document;
      frame.open();
      frame.write(htmlCode+cssCode+jsCode);
      frame.close();
    }
  </script>
@endsection