@section('title','All Materi')
@extends('Admin.layout.admin-layout')
@section('content')
<div class="app-wrapper">
	    
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
							<h1 class="app-page-title mb-0">Semua Materi</h1>
				</div>
				<div class="col-auto">
					 <div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<form class="table-search-form row gx-1 align-items-center" autocomplete="off" method="GET">
									<div class="col-auto me-1">
											<input type="text" id="search-orders" name="keyword" class="form-control search-orders p-3" placeholder="Search">
									</div>
									<div class="col-auto me-4">
											<button type="submit" class="btn btn-primary btn-sm">Search</button>
									</div>
							</form>
											
							</div><!--//col-->
							<div class="col-auto">
								
								<select class="form-select w-auto">
									<option selected="" value="option-1">All</option>
									<option value="option-2">Text file</option>
									<option value="option-3">Image</option>
									<option value="option-4">Spreadsheet</option>
									<option value="option-5">Presentation</option>
									<option value="option-6">Zip file</option>
									
							</select>
							</div>
							<div class="col-auto">
								<a class="btn app-btn-primary" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-upload me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
								<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
								</svg>Upload File</a>
							</div>
						</div><!--//row-->
					</div><!--//table-utilities-->
				</div><!--//col-auto-->
			</div><!--//row-->
			
			<div class="row">
				@foreach ($allMateri as $item)
				<div class="col-12 col-lg-6 mb-4">
					<div class="all-materi gap-0">
						<div class="card me-5">
							<div class="card-body">
								<h5 class="card-title">{{ $item->kelas->nama_kelas }}</h5>
								<p class="card-text text-truncate">{{strip_tags($item->judul_materi) }}</p>
								<a href="#" class="btn btn-primary">Read More</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

	</div><!--//app-content-->
</div><!--//app-wrapper-->    	
@endsection
    				


