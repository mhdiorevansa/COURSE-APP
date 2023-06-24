@section('title', 'Question')
@extends('layout.main-layout')
@section('content')
				<div class="container-fluid bg-detail-question pt-5">
								<div class="question-detail-header ms-2 ms-lg-5 me-2 me-lg-5">
												<h3 class="mb-3">{{ $getQuestion->judul_forum }}</h3>
												<p class="mb-4">{{ $getQuestion->kelas->nama_kelas }}</p>
												<hr class="mb-4">
								</div>
								<div class="main-question ms-lg-5 ms-2 me-2 me-lg-5 mt-0">
												<div class="main-question-header d-flex justify-content-between">
																<div class="profile d-flex gap-3">

																				@if ($getQuestion->user->gambar != '')
																								<img class="rounded-circle"
																												src="{{ asset('storage/image/change-profile/' . $getQuestion->user->gambar) }}"
																												alt="Gambar Profil Pengguna" width="50" height="50">
																				@else
																								<img src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt="Gambar Default"
																												width="50" height="50">
																				@endif
																				<h5 class="my-auto">{{ $getQuestion->user->username }}</h5>
																</div>
																<div class="date d-flex">
																				<p class="my-auto">{{ $getQuestion->created_at->format('d/m') }}</p>
																</div>
												</div>
												<div class="index-question">
																<p class="m-0">{!! $getQuestion->pertanyaan_forum !!}</p>
																<div class="d-flex justify-content-end mb-5">
																				<a class="mt-lg-5 mt-3 text-center" href="#jawab"><i class="bi bi-arrow-90deg-left me-2"></i>Bantu
																								Jawab</a>
																</div>
												</div>
								</div>
								<hr class="ms-lg-5 ms-2 me-lg-5 me-2 mb-5">
								<div class="answer-question ms-lg-5 ms-2 me-lg-5 me-2">
												<div class="answer-index d-lg-flex mb-4">
																<div class="profile d-flex me-3 mb-lg-0 mb-3 gap-3">
																				@if (Auth::user()->gambar != '')
																								<img class="rounded-circle"
																												src="{{ asset('storage/image/change-profile/' . Auth::user()->gambar) }}" alt="gambar"
																												width="50" height="50">
																				@else
																								<img src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt="gambar" width="50"
																												height="50">
																				@endif
																</div>
																<form style="width: 100%;" action="/answer" method="POST">
																				@csrf
																				<input name="forum_id" type="hidden" value="{{ $getQuestion->id_forum }}">
																				<input name="parent" type="hidden" value="0">
																				<div class="textarea mb-3" id="jawab">
																								<textarea id="jawabpertanyaan" name="konten"></textarea>
																				</div>
																				<div class="jawab mb-4 text-end">
																								<button class="btn rounded-0" type="submit"><i class="bi bi-arrow-90deg-left me-2"></i>Bantu
																												Jawab</button>
																				</div>
																</form>
												</div>
								</div>
								<hr class="ms-lg-5 ms-2 me-lg-5 me-2">
								@foreach ($getQuestion->komentar as $komentar)
												<div class="main-question ms-lg-5 ms-2 me-2 me-lg-5 mt-0">
																<div class="main-question-header d-flex justify-content-between">
																				<div class="profile d-flex gap-3">
																								@if ($komentar->user->gambar != '')
																												<img class="rounded-circle"
																																src="{{ asset('storage/image/change-profile/' . $getQuestion->user->gambar) }}"
																																alt="Gambar Profil Pengguna" width="50" height="50">
																								@else
																												<img src="{{ asset('storage/image/profil_user/default_pp.png') }}" alt="Gambar Default"
																																width="50" height="50">
																								@endif
																								<h5 class="my-auto">{{ $komentar->user->username }}</h5>
																				</div>
																				<div class="date d-flex">
																								<p class="my-auto">{{ $komentar->created_at->format('d/m') }}</p>
																				</div>
																</div>
																<div class="index-question mb-4">
																				<p class="m-0">{!! $komentar->konten !!}</p>
																</div>
												</div>
												<hr class="ms-lg-5 ms-2 me-lg-5 me-2 mb-5">
								@endforeach

								<div class="bg-white">
												<footer class="mt-5 mb-0 py-4">
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
				@push('scriptjs')
								<script>
												ClassicEditor
																.create(document.querySelector('#jawabpertanyaan'), {
																				ckfinder: {
																								uploadUrl: '{{ route('ckeditor.uploadimganswer') . '?_token=' . csrf_token() }}'
																				}
																})
																.catch(error => {
																				console.error(error);
																});
								</script>
				@endpush
