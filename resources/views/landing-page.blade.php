@extends('layout.main-layout')
@section('title', 'Landing-page')

@section('content')

				{{-- hero start --}}
				<div class="hero">
								<img class="img-fluid" src="{{ asset('storage/image/banner/hero.png') }}" alt="">
								<div class="d-flex justify-content-center align-item-center">
												<div
																class="col-11 col-lg-11 position-absolute d-flex flex-column align-items-center justify-content-center top-0">
																<h3 class="hero-heading mb-lg-4 text-center">Belajar Pemrograman dari Level Dasar Hingga Level Lanjut di
																				<span class="brand-title">GrowSI</span></h3>
																<p class="hero-title me-4 ms-4 text-center text-white">Kami menyediakan berbagai materi pembelajaran online
																				untuk meningkatkan skills dibidang teknologi secara gratis</p>
																<a class="btn button-color mt-lg-3 px-lg-4" href="/belajar">Belajar Sekarang</a>
												</div>
								</div>
				</div>
				{{-- hero end --}}

				{{-- superiority start --}}
				<div class="superiority mb-lg-5 ms-lg-5 me-lg-5">
								<div class="superiority-heading">
												<h3 class="mt-lg-5 mb-lg-0 mt-4 mb-4 text-center">Kenapa GrowSI?</h3>
								</div>
								<div class="d-flex justify-content-center">
												<div class="superiority-item w-100 d-flex flex-wrap gap-4 px-3">
																<div class="row">
																				<div class="col-lg-6">
																								<div class="card mb-lg-0 mb-4 p-2">
																												<div class="card-body">
																																<h5 class="card-title"><i class="bi bi-tag me-3"></i>Free Akses</h5>
																																<p class="card-text">Pelajari materi dan modul secara gratis dan ter-update untuk
																																				meningkatkan skills dan kemampuan pemograman anda</p>
																												</div>
																								</div>
																				</div>
																				<div class="col-lg-6">
																								<div class="card mb-0 p-2">
																												<div class="card-body">
																																<h5 class="card-title"><i class="bi bi-code me-3"></i>Code Editor</h5>
																																<p class="card-text">Kami menyediakan code editor pada halaman materi, agar anda dapat
																																				langsung mencoba menulis code</p>
																												</div>
																								</div>
																				</div>
																</div>
																<div class="row">
																				<div class="col-lg-6">
																								<div class="card mb-lg-0 mb-4 p-2">
																												<div class="card-body">
																																<h5 class="card-title"><i class="bi bi-chat-left me-3"></i>Forum Pertanyaan</h5>
																																<p class="card-text">Tidak perlu khawatir jika mengalami kendala error, anda dapat bertanya
																																				pada forum terkait error yang terjadi</p>
																												</div>
																								</div>
																				</div>
																				<div class="col-lg-6">
																								<div class="card mb-lg-0 mb-3 p-2">
																												<div class="card-body">
																																<h5 class="card-title"><i class="bi bi-award me-3"></i>Rankings</h5>
																																<p class="card-text">Terdapat leaderboard untuk melihat user mana yang paling rajin
																																				menyelesaikan materi kursus</p>
																												</div>
																								</div>
																				</div>
																</div>
												</div>
								</div>
				</div>
				{{-- superiority end --}}

				{{-- course list start --}}
				<div class="container-fluid bg-course-list">
								<div class="course-list ms-lg-5 ms-2 me-lg-5 me-2 pt-lg-5 pb-lg-4 mt-4 pt-4">
												<div class="course-list-header d-lg-flex justify-content-lg-between align-items-lg-center">
																<h2>Akses materi berikut secara gratis</h2>
																<a href="/belajar">Lihat semua</a>
												</div>
												<ul class="cards pb-lg-5 gap-4 pb-5">
																@foreach ($kelas as $item)
																				<div class="col-lg-4 col-8">
																								<li class="card">
																												<div class="card-img py-lg-4 d-flex justify-content-center py-4">
																																<img class="img-fluid"
																																				src="{{ asset('storage/image/gambar-kelas/' . $item->gambar_kelas) }}" alt="">
																												</div>
																												<div class="card-content w-100 p-2 text-center">
																																<h3>{{ $item->nama_kelas }}</h3>
																												</div>
																												<div class="card-link-wrapper d-flex justify-content-center mb-lg-5 mb-4">
																																<a class="card-link" href="/detail-kelas/{{ $item->id_kelas }}">Pelajari Kursus</a>
																												</div>
																								</li>
																				</div>
																@endforeach
												</ul>
								</div>
				</div>
				{{-- course list end --}}

				{{-- information start --}}
				<div class="information d-lg-flex flex-sm-column flex-lg-row">
								<div class="information-description ms-lg-5 me-lg-5 ms-4 me-4 pb-lg-0 mt-lg-5 mb-lg-5 pb-3">
												<div class="col-lg-9">
																<h3>Temukan berbagai materi menarik untuk meningkatkan kemampuan digital Anda!</h3>
																<p class="mt-lg-4 mb-lg-4">Materi disusun berdasarkan kebutuhan industri yang ada saat ini</p>
																<div class="d-flex justify-content-center justify-content-lg-start">
																				<a class="btn btn-information rounded-0 py-lg-2 px-lg-4" href="/belajar">Pelajari Sekarang</a>
																</div>
												</div>
								</div>
								<div class="col-lg-4">
												<div class="banner-information">
																<img class="img-fluid" src="{{ asset('storage/image/banner/banner-information.png') }}" alt="">
												</div>
								</div>
				</div>
				{{-- information end --}}

				{{-- testimonials start --}}
				<div class="container-fluid bg-course-list">
								<div class="testimonials ms-2 me-2 ms-lg-5 me-lg-5 pt-lg-5 pb-lg-5 pb-3 pt-5">
												<h3 class="mb-lg-3">Pendapat mereka tentang GrowSI</h3>
												<ul class="cards gap-lg-4 gap-4">
																@foreach ($feedback as $item)
																				<div class="col-lg-5 col-10">
																								<li class="card" style="height: 16rem;">
																												<div class="card-profile d-flex align-items-center">
																																{{-- <img src="{{ asset('storage/image/testimoni/dedisedboy.png') }}" alt=""> --}}
																																@if ($item->user->gambar != '')
																																				<img class="rounded-circle"
																																								src="{{ asset('storage/image/change-profile/' . $item->user->gambar) }}"
																																								alt="" width="60" height="60">
																																@else
																																				<img src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt="Gambar Default"
																																								width="60" height="60"">
																																@endif
																																<h3 class="card-title ms-lg-3 ms-3 text-capitalize">{{ $item->user->username }}</h3>
																												</div>
																												<div class="card-content">
																																<p class="">{{ $item->isi_feedback }}</p>
																												</div>
																								</li>
																				</div>
																@endforeach
												</ul>
								</div>
				</div>
				{{-- testimonials end --}}

				{{-- call to action start --}}
				<div
								class="call-to-action d-flex flex-column align-items-center justify-content-center flex-lg-row justify-content-lg-between ms-lg-5 me-lg-5 ms-3 me-3">
								<div class="col-lg-7">
												<h3>Ayo tunggu apa lagi? Kembangkan skills kamu sekarang!</h3>
								</div>
								<div class="col-lg-4 d-flex align-items-lg-center justify-content-lg-end">
												<a class="btn btn-primary py-lg-3 px-lg-5 rounded-0" href="/belajar">Belajar Sekarang</a>
								</div>
				</div>
				{{-- call to action end --}}

				{{-- footer start --}}
				<div class="container-fluid bg-course-list">
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
@endsection
