<?php
===========================================Auth Commands=====================================================================
- composer create-project  laravel/laravel restorant_order_management//put version name at last to install specific version9.52.16,7.30.6
env file ma database connect kri sidhu aa commands run krva
1 - php artisan migrate
2 - composer require laravel/ui:*
3 - php artisan ui vue --auth
4 - npm install
5 - npm run dev
-http://127.0.0.1:8000/register or login
-php artisan route:list  //all routes list
-{{auth()->user()->id}} //all the fields from users table will store in session



-jo Auth\LoginController not found error aavti hoi to  Providers/RouteServiceProvider ma jai ne
protected $namespace = 'App\\Http\\Controllers'; line ni comment kadhi nakhvi

-if logout redirects on home page instead of login page then comment 
	$this->middleware('guest')->except('logout'); this line from LoginController
 
=============================================================================================================================
- php artisan --version //to check laravel version
- php artisan serve  
- php artisan make:controller ControllerName  // make controller
- php artisan make:model ModelName  //make model
- .env file and config/database.php // database connection


- <input type = "hidden" name = "_token" id="csrf" value = "<?php echo csrf_token(); ?>"> , @csrf
- $res = Home_model::insertmembersModel($request); 
 
 
 ===========================================CSS & JS=========================================================================
all css and js file put inside public folder
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/stylematerial.css') }}">
<script type="text/javascript" src="{{ asset('assets/plugins/jQuery/jquery-3.2.1.min.js') }}"></script>
<img src="{{ asset('assets/images/logo-text.png') }}" alt=""> //image path












to take the PHP version info
echo  phpinfo(); 
		exit;












      


?>