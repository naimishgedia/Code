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
		  Manage Permissions
		</h2>
	  </div>
	  <div class="col-auto ms-auto d-print-none">
		<div class="btn-list">
		  
		  
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
						  <h3 class="card-title">Manage Permissions</h3>
					   </div>
					   <div class="table-responsive">
						 @if (Session::has('successmsg'))
							<div class="alert alert-success z-depth-1" role="alert" id="alertmsg" style="background-color: #d6ffd6;">
									<strong>{!! Session::get('successmsg') !!}</strong>
							</div>
						@endif 	
						{!! Form::open(array('route' => 'admin.user.permission.store','method'=>'POST','autocomplete'=>'off','class'=>'form-horizontal','files'=>'true')) !!}
						<input type="hidden" name="user_id" value="{{ $id }}">
						  <table id="example" class="table table-bordered table-striped data-table">
							 <thead>
								<tr>
								   <th>Id</th>
								   <th>Permission</th>
								   <th></th>
								</tr>
							 </thead>  
							 <tbody> 
								 @if(!empty($permission) && count($permission) > 0)
									  @foreach($permission as $key => $value)
										<tr> 
											<td>{{ ++$key }}</td>
											<td>{{ $value->name }}</td>
											<td>
											  <input type="checkbox" name="select-single[]" class="sub_chk" value="{{ $value->id }}" {{ in_array($value->id,$userPermission) ? 'checked' : '' }}>
											</td>
										</tr>
									  @endforeach
								  @else
									 <td  colspan="8">There Are No Permission.</td>
								  @endif
							 </tbody>
						  </table>
						  <div class="box-footer text-center">
							<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
						  </div>
						  
						  {!! Form::close() !!}
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


</script>
			
@endsection


