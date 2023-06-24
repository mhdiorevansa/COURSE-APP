@section('title','Control Materi')
@extends('Admin.layout.admin-layout')

@section('content')    
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
			  	<h1 class="app-page-title mb-0">Control Materi</h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<form class="table-search-form row gx-1 align-items-center" autocomplete="off" method="GET">
									<div class="col-auto me-1">
										<input type="text" id="search-orders" name="keyword" class="form-control search-orders p-3" placeholder="Search materi">
									</div>
									<div class="col-auto me-4">
										<button type="submit" class="btn btn-primary btn-sm">Search</button>
									</div>
								</form>					                
							</div><!--//col-->
						</div><!--//row-->
					</div><!--//table-utilities-->
				</div><!--//col-auto-->
			</div><!--//row-->
			   
				<div class="add-data">
          <a href="/add-materi" class="btn btn-primary">Tambah data</a>
        </div>

				@if (Session::has('status-materi-success'))
					<div class="col-12 mt-3">
						<div class="alert alert-success text-start" role="alert">
							{{ Session::get('message-materi-success') }}
						</div>
					</div>
				@endif
				@if (Session::has('status-materi-deleted'))
					<div class="col-12 mt-3">
						<div class="alert alert-danger text-center" role="alert">
							{{ Session::get('message-materi-deleted') }}
						</div>
					</div>
				@endif
				@if (Session::has('status-materi-updated'))
				<div class="col-12 mt-3">
					<div class="alert alert-success text-center" role="alert">
						{{ Session::get('message-materi-updated') }}
					</div>
				</div>
			@endif

				<div class="tab-content mt-4" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">

										<div class="table-responsive table-control-mapel">
											<table class="table app-table-hover mb-0 text-center table-bordered" style="width: 100%; height: 10px;">
											<thead>
												<tr>
													<th class="cell">No</th>
													<th class="cell">Judul Materi</th>
													<th class="cell">Nama Kelas</th>
													<th class="cell">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($controlMateri as $item)
												<tr>
													<td class="cell">{{ $loop->iteration }}</td>
													<td class="cell">
														<span class="text-overflow">{{ $item->judul_materi }}</span>
													</td>								
													<td class="cell">
														<span class="text-overflow">{{ $item->kelas->nama_kelas }}</span>
													</td>
													<td class="cell d-flex justify-content-center">
														<a href="/update-materi/{{ $item->id_materi }}" class="btn btn-warning me-2 text-white mb-2 mb-lg-0">Update</a>
														<form action="/destroy-materi/{{ $item->id_materi }}" method="POST" onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')">
															@csrf
															@method('delete')
															<button type="submit" class="btn btn-danger">Delete</button>
														</form>
													</td>
												</tr>
												@endforeach
											</tbody>
											</table> 
											</div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
			        </div><!--//tab-pane-->
			        
				</div><!--//tab-content--
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
</div><!--//app-wrapper-->    					
@endsection


