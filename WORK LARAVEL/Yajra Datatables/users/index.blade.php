@extends('admin.layouts.admin_layout')
@section('content')  
<style>
.container-xl{
	max-width: 1594px;	
 }
 
 
.table-responsive{
	padding: 7px;
}

.dataTables_info{
	padding: 10px;
}	
.dataTables_paginate paging_simple_numbers{
    padding: 10px;
}

	
</style>

<div class="container-xl">
  <div class="page-header d-print-none">
	<div class="row align-items-center">
	  <div class="col">
		
		<h2 class="page-title">
		  Users
		</h2>
	  </div>
	  <div class="col-auto ms-auto d-print-none">
		<div class="btn-list">
		  <a href="{{ route('users.create')}}" class="btn btn-primary d-none d-sm-inline-block">
			+
		  </a>
		  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
			<!-- Download SVG icon from http://tabler-icons.io/i/plus -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
		  </a>
		</div> 
	  </div>
	</div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
	<div class="row row-deck row-cards">
		<div class="col-12"> 
				<div class="card">
					   <div class="card-header">
						  <h3 class="card-title">User Lists</h3>
					   </div>
					   <div class="table-responsive">
					   
						 @if (Session::has('successmsg'))
								<div class="alert alert-success z-depth-1" role="alert" id="alertmsg" style="background-color: #d6ffd6;">
										<strong>{!! Session::get('successmsg') !!}</strong>
								 </div>
						@endif 	
						  <table id="example" class="table table-bordered table-striped data-table">
							 <thead>
								<tr>
								   <th>Id</th>
								   <th>First Name</th>
								   <th>Middle Name</th>
								   <th>Last Name</th>
								   <th>Email</th>
								   <th>Edit</th>
								   <th>Delete</th>
								</tr>
							 </thead>
							 <tbody>
							 </tbody>
						  </table>
					   </div>
				</div>
		</div>
	</div>
  </div>
</div>
<script> 
$(document).ready(function(){
   $('#example_two').DataTable();
});

$(function () {
	var table = $('.data-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ route('users.index') }}",
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'first_name', name: 'first_name'},
			{data: 'middle_name', name: 'middle_name'},
			{data: 'last_name', name: 'last_name'},
			{data: 'email', name: 'email'},
			{data: 'edit', name: 'edit'},
			{data: 'delete', name: 'delete'},
		]
	});
});
</script>
			
@endsection


