<?php
================================SERVER SIDE VALIDATION================================================================
$request->validate([
	'name' => 'required|string|max:255',
	'email' => 'required|email|unique:users,email',
	'password' => 'required|confirmed|min:6', //for the length validation
	'mo_num' => 'required|digits:10',  // Ensure the mobile number is exactly 10 digits
], [
	'name.required' => 'The name field is required.',
	'email.required' => 'The email field is required.',
	'email.unique' => 'This email is already taken.',
	'password.required' => 'The password field is required.',
	'password.confirmed' => 'Password and Confirm password do not match.',
	'mo_num.digits' => 'The mobile number must be exactly 10 digits.',
]);
//aama password and confirm password nu validation pan thai jase.password and confirm_password na name aa rite aapva
//<input type="password" class="form-control" id="password" name="password" placeholder="******">
//<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="******">


//Image Validation
$this->validate($request, [
	'image' => 'required|mimes:jpg,jpeg,png'
], [
	'image.required' => 'Image field is required.',
	'image.mimes' => 'Only JPG and PNG images are allowed.'
]);
  
@if(count($errors))
	<div class="alert alert-danger" id="alertmsg">
	    <ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>   
	</div>
@endif

================================SESSION and SESSION FLASH DATA===============================================================
use Session;   //put this code at top of controller
Session::put('user_id', $lastRecord->id);  //store session 
Session::forget('user_id') // unset perticular session
echo  Session::get('user_id');  //to display data in view
if(null !==(Session::get('user_id'))){} //check if session is set or not   
Auth::login($user); // ragistration vakhte session set karva mate. it is used to set session at anytime

Session::flash('successmsg', 'Welcome User');//set session flash data
session()->flash('successmsg', 'Register Successfully, Login Here'); //You can use this as well
@if (Session::has('successmsg'))
			<div class="alert alert-success z-depth-1" role="alert" id="alertmsg">
				<strong>{!! Session::get('successmsg') !!}</strong>
		   </div>
@endif 
 
Session::flash('errormsg', 'Welcome User');//set session flash data 
session()->flash('errormsg', 'Something went wrong, try again');// You can use this as well
@if (Session::has('errormsg'))
			<div class="alert alert-danger z-depth-1" role="alert" id="alertmsg">
				<strong>{!! Session::get('errormsg') !!}</strong>
		</div>
@endif