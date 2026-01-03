<?php

in web.php write
use App\Http\Controllers\Auth\LoginController;  at the top  and write route like this 
Route::get('admin/register', [LoginController::class, 'registerFunction'])->name('admin.register');

Route::get('admin/register', [\App\Http\Controllers\Auth\LoginController::class, 'registerFunction'])->name('admin.register'); // if we dont pass namespace at top of web.php

jo Auth\LoginController not found error aavti hoi to  upar nu solution j try krvu 


===========================================================================================================================