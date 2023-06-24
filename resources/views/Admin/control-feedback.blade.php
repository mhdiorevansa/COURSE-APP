@section('title', 'Control Feedback')
@extends('Admin.layout.admin-layout')

@section('content')
				<div class="app-wrapper">
								<div class="app-content p-md-3 p-lg-4 pt-3">
												<div class="container-xl">
																<div class="row g-3 align-items-center justify-content-between mb-4">
																				<div class="col-auto">
																								<h1 class="app-page-title mb-0">Control Feedback</h1>
																				</div>
																				<div class="col-auto">
																								<div class="page-utilities">
																												<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
																																<div class="col-auto">
																																				<form class="table-search-form row gx-1 align-items-center" autocomplete="off"
																																								method="GET">
																																								<div class="me-1 col-auto">
																																												<input class="form-control search-orders p-3" id="search-orders" name="keyword"
																																																type="text" placeholder="Search Feedback">
																																								</div>
																																								<div class="me-4 col-auto">
																																												<button class="btn btn-primary btn-sm" type="submit">Search</button>
																																								</div>
																																				</form>
																																</div>
																																<!--//col-->
																												</div>
																												<!--//row-->
																								</div>
																								<!--//table-utilities-->
																				</div>
																				<!--//col-auto-->
																</div>
																<!--//row-->

																@if (Session::has('status-feedback-deleted'))
																				<div class="col-12 mt-3">
																								<div class="alert alert-danger text-center" role="alert">
																												{{ Session::get('message-feedback-deleted') }}
																								</div>
																				</div>
																@endif

																<div class="tab-content mt-4" id="orders-table-tab-content">
																				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
																								<div class="app-card app-card-orders-table mb-5 shadow-sm">
																												<div class="app-card-body">

																																<div class="table-responsive table-control-mapel">
																																				<table class="app-table-hover table-bordered mb-0 table text-center"
																																								style="width: 100%; height: 10px;">
																																								<thead>
																																												<tr>
																																																<th class="cell">No</th>
																																																<th class="cell">Nama User</th>
																																																<th class="cell">Feedback</th>
																																																<th class="cell">Aksi</th>
																																												</tr>
																																								</thead>
																																								<tbody>
																																												@foreach ($feedback as $item)
																																																<tr>
																																																				<td class="cell">{{ $loop->iteration }}</td>
																																																				<td class="cell">
																																																								<span>{{ $item->user->username }}</span>
																																																				</td>
																																																				<td class="cell">
																																																								<span class="text-overflow">{{ $item->isi_feedback }}</span>
																																																				</td>
																																																				<td class="cell d-flex justify-content-center">
																																																								<form action="/destroy-feedback/{{ $item->id_feedback }}"
																																																												method="POST"
																																																												onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')">
																																																												@csrf
																																																												@method('delete')
																																																												<button class="btn btn-danger" type="submit">Delete</button>
																																																								</form>
																																																				</td>
																																																</tr>
																																												@endforeach
																																								</tbody>
																																				</table>
																																</div>
																																<!--//table-responsive-->

																												</div>
																												<!--//app-card-body-->
																								</div>
																								<!--//app-card-->

																				</div>
																				<!--//tab-pane-->

																</div>
																<!--//tab-content--
																			
																		</div><!--//container-fluid-->
												</div>
												<!--//app-content-->

								</div>
								<!--//app-wrapper-->
				@endsection
