@section('title', 'Ranking')
@extends('layout.main-layout')
@section('content')
				<div class="container-fluid p-0">
								<div class="ranking-header col-12 pt-5">
												<h3 class="mb-5 text-center">Leaderboard</h3>
												<div class="col-12 d-flex justify-content-between top-3 mb-0">
																@if ($topUsers->count() >= 2)
																				<div class="d-flex flex-column align-items-center text-center">
																								@if ($users[1]->gambar != '')
																												<img class="rounded-circle mb-2"
																																src="{{ asset('storage/image/change-profile/' . $users[1]->gambar) }}" alt=""
																																width="180" height="180"><span><img
																																				src="{{ asset('storage/image/banner/Top 2 - Badge.png') }}" alt=""></span>
																								@else
																												<img class="mb-2" src="{{ asset('storage/image/profil_user/default_pp.png') }}"
																																alt="Gambar Default" alt="" width="180" height="180"><span><img
																																				src="{{ asset('storage/image/banner/Top 2 - Badge.png') }}" alt=""></span>
																								@endif
																								<div class="info d-flex flex-column align-items-center text-center">
																												<h3>{{ $topUsers[1]->username }}</h3>
																												<p class="rounded-pill py-2 px-0">{{ $topUsers[1]->skor }} point</p>
																								</div>
																				</div>
																@else
																				<div class="d-flex flex-column align-items-center text-center">
																								<img class="mb-2" src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt=""
																												width="180" height="180"><span><img
																																src="{{ asset('storage/image/banner/Top 2 - Badge.png') }}" alt=""></span>
																								<div class="info d-flex flex-column align-items-center text-center">
																												<h3>-</h3>
																												<p class="rounded-pill py-2 px-0">- point</p>
																								</div>
																				</div>
																@endif

																@if ($topUsers->count() >= 1)
																				<div class="d-flex flex-column align-items-center text-center">
																								@if ($users[0]->gambar != '')
																												<img class="rounded-circle mb-2"
																																src="{{ asset('storage/image/change-profile/' . $users[0]->gambar) }}" alt=""
																																width="180" height="180"><span><img
																																				src="{{ asset('storage/image/banner/Top 1 - Badge.png') }}" alt=""></span>
																								@else
																												<img class="mb-2" src="{{ asset('storage/image/profil_user/default_pp.png') }}"
																																alt="Gambar Default" alt="" width="180" height="180"><span><img
																																				src="{{ asset('storage/image/banner/Top 1 - Badge.png') }}" alt=""></span>
																								@endif
																								<div class="info d-flex flex-column align-items-center text-center">
																												<h3 class="">{{ $topUsers[0]->username }}</h3>
																												<p class="rounded-pill py-2 px-0">{{ $topUsers[0]->skor }} point</p>
																								</div>
																				</div>
																@else
																				<div class="d-flex flex-column align-items-center text-center">
																								<img class="mb-2" src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt=""
																												width="180" height="180"><span><img
																																src="{{ asset('storage/image/banner/Top 2 - Badge.png') }}" alt=""></span>
																								<div class="info d-flex flex-column align-items-center text-center">
																												<h3>-</h3>
																												<p class="rounded-pill py-2 px-0">- point</p>
																								</div>
																				</div>
																@endif
																@if ($topUsers->count() >= 3)
																				<div class="d-flex flex-column align-items-center mb-0 text-center">
																								@if ($users[2]->gambar != '')
																												<img class="rounded-circle mb-2"
																																src="{{ asset('storage/image/change-profile/' . $users[2]->gambar) }}" alt=""
																																width="180" height="180"><span><img
																																				src="{{ asset('storage/image/banner/Top 3 - Badge.png') }}" alt=""></span>
																								@else
																												<img class="mb-2" src="{{ asset('storage/image/profil_user/default_pp.png') }}"
																																alt="Gambar Default" alt="" width="180" height="180"><span><img
																																				src="{{ asset('storage/image/banner/Top 3 - Badge.png') }}" alt=""></span>
																								@endif
																								<div class="info d-flex flex-column align-items-center text-center">
																												<h3>{{ $topUsers[2]->username }}</h3>
																												<p class="rounded-pill py-2 px-0">{{ $topUsers[2]->skor }} point</p>
																								</div>
																				</div>
																@else
																				<div class="d-flex flex-column align-items-center text-center">
																								<img class="mb-2" src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt=""
																												width="180" height="180"><span><img
																																src="{{ asset('storage/image/banner/Top 2 - Badge.png') }}" alt=""></span>
																								<div class="info d-flex flex-column align-items-center text-center">
																												<h3>-</h3>
																												<p class="rounded-pill py-2 px-0">- point</p>
																								</div>
																				</div>
																@endif
												</div>
								</div>
				</div>
				<div class="container-fluid d-flex justify-content-center mt-5 mb-5">
								<div class="col-lg-9 col-12">
												@php
																$customNumber = 3;
												@endphp
												@if ($remainingUsers->count() > 0)
																<div class="card px-3 pt-4 pb-2">
																				@foreach ($remainingUsers as $item)
																								@php
																												$customNumber++;
																								@endphp
																								<div class="card-body p-lg-0 p-0">
																												<div
																																class="left-info-rank bg-rankafter d-lg-flex align-items-lg-center justify-content-between mb-3 p-3">
																																<div class="d-flex align-items-lg-center align-items-center info-another-rank">
																																				<h4 class="me-4">{{ $customNumber }}.</h4>
																																				@if ($item->gambar != '')
																																								<img class="me-lg-2 rounded-circle"
																																												src="{{ asset('storage/image/change-profile/' . $item->gambar) }}"
																																												alt="" width="60" height="60">
																																				@else
																																								<img class="me-lg-2 mb-2"
																																												src="{{ asset('storage/image/profil_user/default_pp.png') }}"
																																												alt="Gambar Default" alt="" width="60" height="60">
																																				@endif
																																				<h4 class="text-truncate ms-3">{{ $item->username }}</h4>
																																</div>
																																<div class="d-lg-flex align-items-lg-end mt-lg-3 ms-0 point text-center">
																																				<p class="rounded-pill py-2">{{ $item->skor }} point</p>
																																</div>
																												</div>
																								</div>
																				@endforeach
																</div>
												@else
																<div class="card px-3 pt-4 pb-2">
																				<div class="card-body p-lg-0">
																								<div
																												class="left-info-rank bg-rankafter d-lg-flex align-items-lg-center justify-content-between mb-3 p-3">
																												<div class="d-flex align-items-lg-end align-items-center info-another-rank">
																																<h4 class="me-4">4.</h4>
																																<img class="me-4" src="{{ asset('storage/image/profil_user/default_pp.png') }}"
																																				alt="" width="60" height="60">
																																<h4 class="text-truncate">-</h4>
																												</div>
																												<div class="d-lg-flex align-items-lg-end mt-lg-3 point text-center">
																																<p class="rounded-pill py-2">- point</p>
																												</div>
																								</div>
																				</div>
												@endif

								</div>
				</div>
				</div>

				<div class="bg-white">
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
