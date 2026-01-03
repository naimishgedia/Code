<?php
$name = $request->input('name'); 
$input = $request->all(); 

=====================================AJAX===============================================================================
<meta charset="UTF-8" name="_token" content="{{ csrf_token() }}"> // include this in head tag
var token = $("meta[name='_token']").attr('content');
var FetchUserChatHistory = "{{ route('front.ajax.userchatistory') }}";
var exam_student_id = "{{ $studentExam->exam_student_id }}";  //  store variable in js

$.ajaxSetup({
			  headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
		   });
$.ajax({
		url:FetchUserChatHistory,
		method:"POST",
		data:{
			_token:token,
			exam_student_id:exam_student_id
		},
		success:function(res){
			//something		
		}
})

//json parse
$jsonData=array();
$jsonData['user_id']=$row['id'];
$jsonData['status']=1;
echo json_encode($jsonData); ////return this data in ajax file

success:function(result)   
{      
  var json = JSON.parse(result); //get data in view file
  var user_id= json.user_id;
  var status= json.status;
}


<?========================================NAVIGATION==========================================================================
<form method="POST" action="{{ route('admin.viewpapers_questions') }}">
<a href="{{ route('admin.viewpapers','2') }}">View Paper</a>
<a href="{{ route('admin.viewpapers',['id'=>$id,'value'=>$value]) }}">View Paper</a>// This is for multiple parameters
Route::get('viewpapers', array('as'=> 'admin.viewpapers', 'uses' => 'Admin\ExamTeacherGroupController@viewpapersFunction'));

//REDIRECT
return redirect()->back();
return redirect()->route('my-team');
return redirect('dashboard');//route name in web file
return redirect()->action('DashboardController@dashboardpage'); //controller and  method name

//Route thi route call kravine data pass krva mate
return redirect()->route('front.otp',['userid'=>$result[0]->id]);
Route::any('/user-otp/{userid}',array('as'=>'front.otp','uses'=>'FrontController@otpFunction'));

//Call view file
return view('authentication/login',$data); 
return view('authentication.login',compact('examData','studentExam'));
@include('admin.exam.manageQuestion.multipelQuestion')  // include sub blade file in file(path after view folder) 





================================================EXTRA CODE================================================================
//jo Admin controller Admin folder ma rakhvo hoi to controller nu Upar 
namespace App\Http\Controllers\Admin; avu lakhvu controller ma  and  
web.php ma 
Route::get('/admin/dashboard',array('as'=>'admin.dashboard','uses'=>'Admin\DashboardController@index')); lakhvu
 

//TIMEOUT ERROR
ini_set('max_execution_time',1200); 
ini_set('memory_limit', '-1'); // it indecates infinite memory
 

//helper.php file create krva mate composer.json ma
Pela helpers.php file create karvi 
autoload ma
"files": [ 
            "app/Http/helpers.php"
        ] 
mukine composer dump-autoload command fire krvo


//LOGOUT
public function logoutFunction(Request $request) {
	header("cache-Control: no-store, no-cache, must-revalidate");
	header("cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	Session::flush();
	$request->session()->regenerate();
	Session::flash('message', 'Logout Successfull');
	return redirect('register');
}



//Jo API request ma too many request ni error aavti hoy to ,
env ma CACHE_DRIVER=none karvu
and config/cache.php ma 
'default' => env('CACHE_DRIVER', 'none'), karvu

and 'stores' array ma 
 'none' => [
            'driver' => 'null',
        ],
mukvu

================
 when we need to go back to previous page with data filled we can use below code
 <a href="{{ url()->previous() }}" class="text-decoration-none text-primary">
      ← Back to results
 </a>


===============
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
