<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/* 
=============================================================================================================================================================================
Front Routes
=============================================================================================================================================================================
*/
Route::get('/',array('as'=>'login.view','uses'=>'Auth\LoginController@frontloginView'));
Route::post('/auth/login',array('as'=>'auth.login','uses'=>'Auth\LoginController@loginFront'));
Route::post('/front/logout',array('as'=>'front.logout','uses'=>'Auth\LoginController@logoutFront'));
Route::get('/forgot-password',array('as'=>'front.forgotpassword','uses'=>'Auth\LoginController@forgotpasswordFunction'));
Route::post('/do_forgotpassword',array('as'=>'auth.do_forgotpassword','uses'=>'Auth\LoginController@do_forgotpasswordFunction'));

Route::get('/register',array('as'=>'register.view','uses'=>'Auth\LoginController@frontregisterView'));
Route::post('/do-register',array('as'=>'auth.do_register','uses'=>'Auth\LoginController@do_registerFunction'));


  
//Register For
Route::get('/home', 'FrontController@index')->name('home');
Route::get('/Reg-For',array('as'=>'front.reg_for','uses'=>'FrontController@regforblade'));
Route::post('/RegistrationFor',array('as'=>'front.registrationfor','uses'=>'FrontController@RegistrationFor'));

//Guidilines
Route::any('/guide-lines',array('as'=>'front.guide_lineblade','uses'=>'FrontController@guide_lineblade'));
Route::post('/Guidelines',array('as'=>'front.guidelines','uses'=>'FrontController@Guidelines'));

//Personal Information
Route::any('/personal-information',array('as'=>'front.personalinfoblade','uses'=>'FrontController@personalinfoblade'));
Route::post('/PersonalInformation',array('as'=>'front.personalinformation','uses'=>'FrontController@PersonalInformation'));

//Acedemic routes
Route::any('/std-x',array('as'=>'front.stdx_blade','uses'=>'FrontController@stdx_blade'));
Route::any('/std-xii',array('as'=>'front.stdxii_blade','uses'=>'FrontController@stdxii_blade'));
Route::any('/specific-graduation',array('as'=>'front.specificgraduation_blade','uses'=>'FrontController@specificgraduation_blade'));
Route::any('/specific-post-graduation',array('as'=>'front.specificpostgraduation_blade','uses'=>'FrontController@specificpostgraduation_blade'));
Route::post('/saveacademicdetails',array('as'=>'front.saveacademicdetails','uses'=>'FrontControllerTwo@saveacademicdetailsFunction'));
Route::post('/get-all-passing-year',array('as'=>'front.getallpassingyear','uses'=>'FrontControllerTwo@getallpassingyearFunction'));

//Faculty Subject
Route::any('/faculty-subject',array('as'=>'front.facultysubject_blade','uses'=>'FrontController@facultysubject_blade'));
Route::post('/updatefacultysubject',array('as'=>'front.updatefacultysubject','uses'=>'FrontControllerTwo@updatefacultysubjectFunction'));

//Exam Location
Route::any('/exam-location',array('as'=>'front.examlocationblade','uses'=>'FrontController@examlocationblade'));
Route::post('/updateexamlocation',array('as'=>'front.updateexamlocation','uses'=>'FrontControllerTwo@updateexamlocationFunction'));

//exemption criterea
Route::any('/exemption-criteria',array('as'=>'front.exemptioncriteriablade','uses'=>'FrontController@exemptioncriteriablade'));
Route::post('/exemptioncriteria',array('as'=>'front.exemptioncriteria','uses'=>'FrontControllerTwo@exemptioncriteriaFunction'));

//Document Upload
Route::any('/document-upload',array('as'=>'front.documentupload','uses'=>'FrontController@documentuploadFunction'));
Route::post('/changetopayment',array('as'=>'front.changetopayment','uses'=>'FrontControllerTwo@changetopaymentFunction'));

Route::any('/payment',array('as'=>'front.paymentblade','uses'=>'FrontController@paymentblade'));
Route::any('/receiptpdf',array('as'=>'front.receiptpdf','uses'=>'FrontController@ReceiptPDF'));


Route::post('/changestatus',array('as'=>'admin.changestatus','uses'=>'FrontControllerTwo@changestatusFunction'));
Route::post('/getuniversitylist',array('as'=>'front.getuniversitylist','uses'=>'FrontControllerTwo@getuniversitylistFunction'));
Route::post('/spg_getuniversitylist',array('as'=>'front.spg_getuniversitylist','uses'=>'FrontControllerTwo@spg_getuniversitylistFunction'));
Route::post('/getdegreelist',array('as'=>'front.getdegreelist','uses'=>'FrontControllerTwo@getdegreelistFunction'));
Route::post('/spg_getdegreelist',array('as'=>'front.spg_getdegreelist','uses'=>'FrontControllerTwo@spg_getdegreelistFunction'));
Route::post('/getfacultydata',array('as'=>'front.getfacultydata','uses'=>'FrontControllerTwo@getfacultydataFunction'));
Route::post('/insertextra_university',array('as'=>'front.insertextra_university','uses'=>'FrontControllerTwo@insertextra_universityFunction'));
Route::post('/inserposttextra_university',array('as'=>'front.inserposttextra_university','uses'=>'FrontControllerTwo@inserposttextra_universityFunction'));
Route::post('/insertnewcity',array('as'=>'front.insertnewcity','uses'=>'FrontControllerTwo@insertnewcityFunction'));
Route::post('/uplaoddocument',array('as'=>'front.uplaoddocument','uses'=>'FrontController@UplaodDocument'));
Route::any('/downloadPDF',array('as'=>'front.downloadPDF','uses'=>'FrontController@downloadPDF'));
Route::get('/finish',array('as'=>'admin.finish','uses'=>'FrontControllerTwo@finishFunction'));
Route::post('/proceedpayment',array('as'=>'front.proceedpayment','uses'=>'PaymentController@PaymentProceed'));
Route::any('/paymentsuccess',array('as'=>'front.paymentsuccess','uses'=>'PaymentController@PaymentSuccess'));
Route::post('/getcitylist',array('as'=>'front.getcitylist','uses'=>'FrontControllerTwo@getcitylistFunction'));






/* 
=============================================================================================================================================================================
Admin routes 
=============================================================================================================================================================================
*/
//Auth::routes();
Route::get('/admin/login',array('as'=>'admin.login.view','uses'=>'Auth\LoginController@loginView'));
Route::post('/admin/auth/login',array('as'=>'admin.auth.login','uses'=>'Auth\LoginController@loginAdmin'));
Route::post('/admin/logout',array('as'=>'admin.logout','uses'=>'Auth\LoginController@logoutAdmin'));
Route::post('checkcurrentpassword',array('as'=>'admin.ajax.checkcurrentpassword','uses'=>'Admin\AdminHomeController@checkcurrentpasswordFunction'));
Route::post('changepassword',array('as'=>'admin.ajax.changepassword','uses'=>'Admin\AdminHomeController@changepasswordFunction'));
  
Route::get('admin/dashboard', array('as'=> 'admin.dashboard', 'uses' => 'Admin\AdminHomeController@index'));
  

Route::resource('admin/users','Admin\UserController');
Route::get('admin/scrutiny-allowcation', array('as'=> 'users.scrutinyallowcation', 'uses' => 'Admin\UserController@scrutinyallowcationFunction'));
Route::get('admin/scrutiny-create', array('as'=> 'users.scrutinycreate', 'uses' => 'Admin\UserController@scrutinycreateFunction'));
Route::post('admin/scrutiny-store', array('as'=> 'users.scrutinystore', 'uses' => 'Admin\UserController@scrutinystoreFunction'));
Route::get('admin/scrutinyedit/{id}', array('as'=> 'users.scrutinyedit', 'uses' => 'Admin\UserController@scrutinyeditFunction'));
Route::post('admin/scrutinyupdate', array('as'=> 'scrutinyallocation.update', 'uses' => 'Admin\UserController@scrutinyupdateFunction'));
Route::get('admin/scrutindestroy/{id}', array('as'=> 'users.scrutindestroy', 'uses' => 'Admin\UserController@scrutindestroyFunction'));

Route::get('users/{id}/permission', array('as'=> 'admin.user.permission.home', 'uses' => 'Admin\UserController@managePermission'));
Route::post('users/permission/store', array('as'=> 'admin.user.permission.store', 'uses' => 'Admin\UserController@managePermissionStore'));

Route::resource('admin/country','Admin\CountryMasterController');
Route::resource('admin/state','Admin\StateMasterController');
Route::resource('admin/city','Admin\CityMasterController');
Route::resource('admin/admissiontype','Admin\AdmissionTypeMasterController');
Route::resource('admin/bloodgroup','Admin\BloodgroupMasterController');
Route::resource('admin/board','Admin\BoardMasterController');
Route::resource('admin/degree','Admin\DegreeMasterController');
Route::resource('admin/degreetype','Admin\DegreeTypeMasterController');
Route::resource('admin/document','Admin\DocumentMasterController');
Route::resource('admin/documenttype','Admin\DocumentTypeMasterController');
Route::resource('admin/faculty','Admin\FacultyMasterController');
Route::resource('admin/mothertongue','Admin\MothertongueMasterController');
Route::resource('admin/subject','Admin\SubjectMasterController');
Route::resource('admin/university','Admin\UniversityMasterController');
Route::post('admin/getcitylist',array('as'=>'admin.getcitylist','uses'=>'Admin\UniversityMasterController@GetCityList'));
Route::resource('admin/universitytype','Admin\UniversityTypeMasterController');
Route::resource('admin/caste','Admin\CasteMasterController');
Route::resource('admin/year','Admin\YearMasterController');
Route::resource('admin/cms','Admin\CmsMasterController');
Route::resource('admin/examinationlocation','Admin\ExaminationLocationMasterController');
Route::resource('admin/exemptioncriteria','Admin\ExemptioncriteriaMasterController');
Route::resource('admin/registration','Admin\RegistrationController');
//Route::get('registration/view', array('as'=> 'registration.view', 'uses' => 'Admin\RegistrationController@view'));

Route::get('admin/settings', array('as'=> 'admin.settings', 'uses' => 'Admin\AdminSettingController@indexAdmin'));
Route::post('admin/settings-update', array('as'=> 'admin.settings.update', 'uses' => 'Admin\AdminSettingController@createAdmin'));

