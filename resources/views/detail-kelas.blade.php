@extends('layout.main-layout')
@section('title', 'Detail Kelas')

@section('content')

				{{-- mapel detail start --}}
				<div class="container-fluid mapel-detail py-lg-5 px-0 py-4">
								<div class="ms-lg-5 me-lg-5 mt-lg-3 ms-4 me-4">
												<div class="row gap-lg-5">
																<div class="left-description-mapel col-lg-7 col-12 me-lg-5">
																				<h1 class="mb-lg-3 mb-3">{{ $kelas->nama_kelas }}</h1>
																				<p class="mb-lg-0 mb-0">{{ $kelas->deskripsi_kelas }}</p>
																				<div class="detail-mapel-info d-lg-flex align-items-lg-center mt-lg-4 mb-lg-3">
																								<a class="btn me-lg-4 rounded-0 px-lg-4 py-lg-2 mb-lg-0 mb-4" href="#pengenalanhtml">Mulai Belajar</a>
																								<h5 class="mb-lg-0 mt-lg-0 mb-4 mt-4">GRATIS</h5>
																				</div>
																</div>
																<div class="right-img-mapel col-lg-4 d-lg-flex justify-content-lg-center align-items-lg-center">
																				<img class="mb-lg-0 mb-3" src="{{ asset('storage/image/gambar-kelas/' . $kelas->gambar_kelas) }}"
																								alt="">
																</div>
												</div>
								</div>
				</div>
				{{-- mapel detail end --}}

				<div class="container-fluid p-0">

								{{-- tentang kelas start --}}
								<div class="tentang-kelas ms-lg-5 ms-3 me-lg-5 me-3 mt-lg-5 p-lg-4 mt-5 rounded p-3">
												<h1>Tentang Kelas</h1>
												<p class="mt-lg-3">{!! $kelas->tentang_kelas !!}</p>
								</div>
								{{-- tentang kelas end --}}

								{{-- materi kelas start --}}
								<div class="materi-kelas ms-lg-5 ms-3 me-lg-5 me-3 mt-lg-5 p-lg-4 mt-5 rounded p-3" id="pengenalanhtml">
												<h1 class="mb-lg-4 mb-4">Materi Kelas</h1>
												@foreach ($kelas->materi as $item)
																<div class="col-12 p-lg-3 mb-lg-3 sub-materi">
																				<h3><a href="/materi-detail/{{ $item->id_materi }}">{{ $loop->iteration }}.
																												{{ $item->judul_materi }}</a></h3>
																</div>
												@endforeach
								</div>
								{{-- materi kelas end --}}

								{{-- persiapan kelas start --}}
								<div class="persiapan-kelas ms-lg-5 ms-3 me-lg-5 me-3 mt-lg-5 p-lg-4 mb-5 mt-5 rounded p-3">
												<h1>Persiapan Kelas</h1>
												<p class="mt-lg- mt-3 mb-1">{!! $kelas->persiapan_kelas !!}</p>
								</div>
								{{-- persiapan kelas end --}}

								{{-- rekomendasi start --}}
								{{-- <div class="container-fluid rekomendasi pb-lg-3">
      <div class="course-list ms-lg-5 ms-2 me-lg-5 me-2 pt-lg-5 mt-4 pt-4 ">
        <div class="course-list-header d-lg-flex justify-content-lg-between align-items-lg-center">
          <h1>Rekomendasi kelas untuk kamu</h2>
          <a href="/belajar">Lihat semua</a>
        </div>
        <ul class="cards gap-4 pb-lg-5 pb-5">
          @foreach ($allKelas as $item)
          <div class="col-lg-4 col-8">
            <li class="card">
              <div class="card-img py-lg-5 py-4 d-flex justify-content-center">
                <img src="{{ asset('storage/image/gambar-kelas/' . $kelas->gambar_kelas) }}" class="img-fluid" alt="">
              </div>
              <div class="card-content text-center w-100 p-2">
                <h3>{{ $kelas->nama_kelas }}</h3>
              </div>
              <div class="card-link-wrapper d-flex justify-content-center mb-lg-4 mb-4">
                <a href="/mapel-detail" class="card-link">Pelajari Kursus</a>
              </div>
            </li>
          </div>
          @endforeach       
        </ul>
      </div>
    </div> --}}
								{{-- rekomendasi end --}}

								{{-- footer start --}}
								<div class="container-fluid bg-course-list mt-lg-5 mt-0">
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
								{{-- footer end --}}
				</div>
@endsection
