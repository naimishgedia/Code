@extends('admin.layouts.admin_layout')
@section('content')  
<style>
.container-xl{
	max-width: 1594px;	
 }
</style>

	<div class="container-xl">
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                
                <h2 class="page-title">
                  Users Create
                </h2>
              </div>
              <div class="col-auto ms-auto d-print-none">
                
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              
              
				<div class="col-12">
				   <div class="card card-md">
					  <div class="card-stamp card-stamp-lg">
					  </div>
					  <div class="card-body">
						 <div class="row align-items-center">
							<div class="col-xl-12	">
							   <div class="row">
								 @if (count($errors) > 0)
											  <p style="color:red;">
												  @foreach($errors->all() as $error)
												  {{ $error }} <br>
												  @endforeach      
											  <p>
								 @endif
								 {!! Form::open(array('route'=>'users.store','method'=>'POST','autocomplete'=>'off')) !!}
								  <div class="col-md-6 col-xl-12">
									<div class="mb-3">
									  <div class="form-label">Select User Type</div>
									  <select class="form-control" name="user_type" id="user_type">	
										<option>--select type--</option>
										<option value="2">Scrutiny</option>
									  </select>
									</div>
									<div class="mb-3">
										<div class="row g-2">
										  <div class="col-4">
												<div class="mb-3">
													<label class="form-label">First Name</label>
													<input type="text" class="form-control" name="first_name" placeholder="First Name">
												</div>
										  </div>
										  <div class="col-4">
												<div class="mb-3">
													<label class="form-label">Middle Name</label>
													<input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
												</div>
										  </div>
										  <div class="col-4">
												<div class="mb-3">
													<label class="form-label">Last Name</label>
													<input type="text" class="form-control" name="last_name" placeholder="Last Name">
												</div>
										  </div>
										</div>
									</div>
									<div class="mb-3">
										<div class="row g-2">
										  <div class="col-4">
												<div class="mb-3">
													<label class="form-label">Email</label>
													<input type="text" class="form-control" name="email" placeholder="Email">
												</div>
										  </div>
										  <div class="col-4">
												<div class="mb-3">
													<label class="form-label">Password</label>
													<input type="password" class="form-control" name="password" placeholder="******">
												</div>
										  </div>
										  <div class="col-4">
												<div class="mb-3">
													<label class="form-label">Contact Number</label>
													<input type="text" class="form-control" name="contact_no" placeholder="Contact Number">
												</div>
										  </div>
										</div>
									</div>
									<div class="mb-3">
										<button type="submit" class="btn btn-primary ms-auto">Save</button>
									 </div>
								  </div>
								  {!! Form::close() !!}
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
              
              
              
			  
			  
            </div>
          </div>
        </div>
	
@endsection
