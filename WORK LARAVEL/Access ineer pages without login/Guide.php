<?php
1) put Admin.php middleware in middleware folder  // You can create it by useing command as well

2) register  'admin' => \App\Http\Middleware\Admin::class, 
    middleware in  $routeMiddleware array in Kernal.php
	
3) put Condition in web.php like this
	
	Route::group(['middleware' => 'admin'], function () {
		Route::get('/admin/dashboard',array('as'=>'admin.dashboard','uses'=>'Admin\DashboardController@index'));
	});
	
	
4)  Controller nu upr
	namespace App\Http\Controllers\Admin; //Admin no path aapvo