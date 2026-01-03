@extends('layouts.mainlayout')
@section('content')  

	
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row"> 
						<div class="col-md-6 col-sm-12"> 
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home<?php  echo  Session::get('user_id'); ?></a></li>
									<li class="breadcrumb-item active" aria-current="page">Form</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="html-editor pd-20 bg-white border-radius-4 box-shadow mb-30">
				@if (Session::has('successmsg'))
				<div class="alert alert-success z-depth-1" role="alert" id="alertmsg">
					<strong>{!! Session::get('successmsg') !!}</strong>
			   </div>
				 @endif
				</div>
			</div>

 Admin :
 	Authentication
 	Dashboard
 	Profile
 	Change Password
 	Users
 	Projects -> add discription

 	- Can add General Announcement -> Title , Description
 	- See Leave Applications 
 	- See WorkLog 


TL :
	Authentication  
	Dashboard
	Profile
	Change Password
	Users

	- See general announcement -> Listing
	- Assign projects to Employee -> Select Project , Select Employee
	- Apply For Leave Application -> From,To,Reason
	- See WorkLog -> employee worklog
    


Employee:
	Authentication
	Dashboard
	Change Password

	- Profile
	- See their Projects -> Listing
	- See general announcement -> listing
	- Apply For Leave Application -> from,To,Reason
	- Add Worklog -> Start Time ,End Time, Project Name, Task Description
			
		</div>
	</div>
	
@endsection
