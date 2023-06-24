@section('title', 'forum')
@extends('layout.main-layout-forum')
@section('content')
				<div class="container-fluid p-0">
								<div class="forum-header">
												<div class="row mb-lg-4 d-flex align-items-lg-center justify-content-lg-between justify-content-center p-0 py-4">
																<div class="col-lg-5 col-12 ps-lg-4 ms-lg-5 me-lg-3 d-flex d-lg-block flex-column">
																				<h1 class="mb-lg-4 ms-lg-0 ms-2 me-2 me-lg-0">Mari mulai berdiskusi & temukan bantuan yang Anda cari!
																				</h1>
																</div>
																<div class="col-lg-6 me-lg-5 d-lg-flex justify-content-lg-end justify-content-center">
																				<img src="{{ asset('storage/image/banner/header-forum.png') }}" alt="">
																</div>
												</div>
								</div>
				</div>
				<div class="container-fluid main-forum">
								<div class="search-box d-flex justify-content-center mt-5 mb-5">
												<form action="#" autocomplete="off" method="GET">
																<div class="input-group mb-3 px-2 py-1">
																				<input class="form-control" name="keyword" type="search" aria-label="Recipient's username"
																								aria-describedby="basic-addon2" placeholder="Cari judul diskusi">
																				<span class="input-group-text icon-search" id="basic-addon2">
																								<button type="submit"><i class="bi bi-search"></i></button></span>
																</div>
												</form>
								</div>
								<div class="filter-add ms-lg-5 ms-2 me-lg-5 me-2 mb-5">
												<h3 class="mb-3">Filter berdasarkan:</h3>
												<div class="d-lg-flex justify-content-between">
																<div class="d-flex mb-4 gap-3 filter">
																				<form class="d-flex gap-3" action="/forum" method="GET">
																								<select class="form-select" name="order_by" aria-label="Default select example">
																												<option value="desc" @if ($orderBy === 'desc') selected @endif>Terbaru</option>
																												<option value="asc" @if ($orderBy === 'asc') selected @endif>Terlama</option>
																								</select>
																								<button class="btn btn-login rounded-0" type="Submit">Terapkan</button>
																				</form>
																</div>
																<div class="add-question">
																				<a class="btn rounded-0" href="/make-question"><i class="bi bi-plus-lg me-1"></i> Buat Pertanyaan atau
																								diskusi</a>
																</div>
												</div>
								</div>
								<div class="question pb-4">
												<div class="row">
																@foreach ($forum as $item)
																				<div class="col-12">
																								<div class="card ms-lg-5 ms-2 me-lg-5 me-2 px-lg-3 rounded-0 py-3 px-2">
																												<div class="card-body">
																																<h3><a href="/detail-question/{{ $item->id_forum }}">{{ $item->judul_forum }}</a></h3>
																																<p class="mb-4" style="margin-top: -10px">{!! $item->pertanyaan_forum !!}</p>
																																<div class="info-question mb-0">
																																				<ul class="d-lg-flex gap-lg-3 mb-0 p-0">
																																								<li><i class="bi bi-person me-1"></i>{{ $item->user->username }}</li>
																																								<li><i class="bi bi-tag me-1"></i>{{ $item->kelas->nama_kelas }}</li>
																																								<li><i class="bi bi-clock me-1"></i>{{ $item->created_at->diffForHumans() }}</li>
																																								<li><i class="bi bi-chat-left me-1"></i>{{ $item->komentar_count }} komentar</li>
																																				</ul>
																																</div>
																												</div>
																								</div>
																				</div>
																@endforeach
												</div>
								</div>
								<div class="ms-4 ps-1 ps-lg-0 ms-lg-5 me-5 mb-4 mt-5">
												{{ $forum->withQueryString()->links() }}
								</div>
				</div>
				</div>
				<div class="bg-course-list">
								<footer class="py-4">
												<ul class="nav justify-content-center border-bottom mb-3 pb-3">
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/">Home</a></li>
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/belajar">Belajar</a></li>
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/forum">Forum</a></li>
																<li class="nav-item"><a class="nav-link text-muted px-2" href="/ranking">Ranking</a></li>
												</ul>
												<p class="text-muted text-center">&copy; 2023 IS Application Project, Sistem Informasi</p>
								</footer>
				</div>
@endsection
