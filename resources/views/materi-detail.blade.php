@section('title', 'Materi')
@extends('layout.main-layout')

@section('content')
				<div class="container-fluid bg-out-detailkelas detail-kelas pb-lg-0 pb-0"
								style="border: 1px solid transparent; min-height: 700px;">
								<div class="detail-kelas-again py-lg-4 px-lg-4 mt-lg-5 mb-lg-4 ms-lg-5 ms-2 me-lg-5 me-2 rounded pt-3">
												<div class="intro ms-lg-3 me-lg-3 ms-2 me-2">
																<h1>{{ $materi->judul_materi }}</h1>
																<p>{!! $materi->isi_materi !!}</p>
												</div>
								</div>

								<div
												class="d-flex justify-content-between me-lg-3 ms-lg-4 ms-2 mb-lg-3 mt-lg-0 me-2 py-lg-3 px-lg-4 next-materi mt-5">
												@if ($materiTerakhir && $materi->id_materi != $materiTerakhir->id_materi)
																<a class="btn btn-login" href="/code-test/{{ $materi->id_materi }}">Code Editor</a>
												@endif
												@if ($materiTerakhir && $materi->id_materi === $materiTerakhir->id_materi)
																<a class="btn btn-login" href="/feedback">Beri Feedback</a>
												@endif
												<div class="d-flex justify-content-end gap-lg-3 next gap-2">
																@if ($previousMateri)
																				<a class="btn btn-login previous" href="/materi-detail/{{ $previousMateri->id_materi }}"><i
																												class="bi bi-arrow-left"></i><span>Sebelumnya</span></a>
																@endif
																@if ($nextMateri)
																				<a class="btn btn-login next-again" href="/materi-detail/{{ $nextMateri->id_materi }}"><i
																												class="bi bi-arrow-right"></i><span>Selanjutnya</span></a>
																@endif
												</div>
								</div>
				</div>
@endsection
