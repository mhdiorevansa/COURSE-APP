@section('title','Control Forum')
@extends('Admin.layout.admin-layout')

@section('content')    
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
			  	<h1 class="app-page-title mb-0">Control Forum</h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<form class="table-search-form row gx-1 align-items-center" autocomplete="off" method="GET">
									<div class="col-auto me-1">
										<input type="text" id="search-orders" name="keyword" class="form-control search-orders p-3" placeholder="Search Forum">
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
			   
				@if (Session::has('status-forum-deleted'))
					<div class="col-12 mt-3">
						<div class="alert alert-danger text-center" role="alert">
							{{ Session::get('message-forum-deleted') }}
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
													<th class="cell">Judul Forum</th>
													<th class="cell">Nama Kelas</th>
													<th class="cell">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($forum as $item)
												<tr>
													<td class="cell">{{ $loop->iteration }}</td>
													<td class="cell">
														<span class="text-overflow">{{ $item->judul_forum }}</span>
													</td>								
													<td class="cell">
														<span class="text-overflow">{{ $item->kelas->nama_kelas }}</span>
													</td>
													<td class="cell d-flex justify-content-center">
														<form action="/control-forum/{{ $item->id_forum }}" method="POST" onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')">
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


