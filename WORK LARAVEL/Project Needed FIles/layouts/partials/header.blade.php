<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav"> 
      <li class="nav-item"> 
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>   

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown"> 
	    <a class="nav-link" data-toggle="dropdown" href="#">
			<i class="fa fa-caret-down" style="font-size:30px;color:blue"></i>
        </a>
		 
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="/profile" class="dropdown-item">
            Profile
          </a> 
		   
		  <div class="dropdown-divider"></div>  
          <a href="#" id="changePassword" class="dropdown-item">
             Change Password
          </a>
  
          <div class="dropdown-divider"></div> 
          <a href="/logout" class="dropdown-item">
             Logout
          </a> 
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
</nav>


 <div class="modal fade" id="changepassword_model">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"> 
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">   
				
              <div class="card-body">
			  <form> 
					<input type = "hidden" name = "_token" id="csrf" value = "<?php echo csrf_token(); ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Current Passwrod</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter email" onchange="currentPassword()" >
					<p id="currntpasnotmatch" style="color:red;display:none;">Wrong Password</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password">
                  </div> 
				  <div class="form-group">
                    <label for="exampleInputPassword1">Conform Password</label>
                    <input type="password" class="form-control" id="passwordtwo" name="passwordtwo" placeholder="Password">
					<p id="password_doesnotmatch" style="color:red;display:none;">password does not match</p>
                  </div> 
                </div>
			 </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="updatepassword" class="btn btn-primary">Update Password</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>