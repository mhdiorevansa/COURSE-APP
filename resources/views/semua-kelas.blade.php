@section('title', 'Belajar')
@extends('layout.main-layout')

@section('content')
				<div class="container-fluid cover-page-belajar">
								<div class="row p-0">
												<div class="col-lg-5 ms-lg-5 d-flex d-lg-block flex-column">
																<h1 class="mb-lg-4">Bergabunglah dengan kelas online kami secara gratis</h1>
																<a class="btn btn-login rounded-0 py-lg-2 px-lg-4" href="#aksesberbagaikelas">Temukan Kelas</a>
												</div>
												<div class="col-lg-6 me-lg-5 d-lg-flex justify-content-lg-end">
																<img src="{{ asset('storage/image/banner/cover-page-belajar.png') }}" alt="">
												</div>
								</div>
				</div>

				<div class="container-fluid">
								<div class="course-list ms-lg-5 ms-2 me-lg-5 me-2 pt-lg-5 mb-lg-5 mt-4 pt-4">
												<div class="course-list-header d-lg-flex justify-content-lg-between align-items-lg-center">
																<h2 id="aksesberbagaikelas">Kelas yang sedang dipelajari</h2>
												</div>
												<ul class="cards pb-lg-5 gap-4 pb-5">
																@foreach ($kelas as $item)
																				<div class="col-lg-4 col-8">
																								<li class="card">
																												<div class="card-img py-lg-5 d-flex justify-content-center py-4">
																																<img class="img-fluid"
																																				src="{{ asset('storage/image/gambar-kelas/' . $item->gambar_kelas) }}" alt="">
																												</div>
																												<div class="card-content w-100 p-2 text-center">
																																<h3>{{ $item->nama_kelas }}</h3>
																												</div>
																												<div class="card-link-wrapper d-flex justify-content-center mb-lg-4 mb-4">
																																<a class="card-link" href="/detail-kelas/{{ $item->id_kelas }}">Pelajari Kursus</a>
																												</div>
																								</li>
																				</div>
																@endforeach
												</ul>
								</div>
				</div>

				{{-- <div class="container-fluid bg-course-list">
    <div class="all-course-header ms-lg-5 me-lg-5 py-lg-5 py-4">
      <h2 id="aksesberbagaikelas">Akses berbagai kelas berikut secara gratis</h2>
    </div>
    <div class="all-course ms-lg-5 ms-2 me-2 me-lg-5">
      <div class="row">
        @foreach ($kelas as $item)
        <div class="col-lg-4">
          <div class="card mb-5">
            <div class="card-header border-0 py-4 py-lg-5 d-flex justify-content-center">
              <img src="{{ asset('storage/image/gambar-kelas/' . $item->gambar_kelas) }}" alt="">
            </div>
            <div class="card-body p-2 mt-lg-3">
              <h3 class="text-center mb-lg-4">{{ $item->nama_kelas }}</h3>
              <div class="card-link d-flex justify-content-center mb-4">
                <a href="/detail-kelas/{{ $item->id_kelas }}" class="btn btn-login">Pelajari Kursus</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div> --}}

				<div class="container-fluid">
								<footer class="py-4">
												<ul class="nav justify-content-center border-bottom mb-3 pb-3">
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/">Home</a></li>
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/belajar">Belajar</a></li>
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/forum">Forum</a></li>
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/quiz">Quiz</a></li>
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/ranking">Ranking</a></li>
												</ul>
												<p class="text-muted text-center">&copy; 2023 IS Application Project, Sistem Informasi</p>
								</footer>
				</div>
@endsection
