<?php

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
Route::get('/admindashboard', 'AdminController@index')->name('admindashboard');
Route::get('/superdashboard', 'SuperController@index')->name('superdashboard');
//Route::get('/page','PagesController@index');
//Route::get('/history','HistoryController@index');
Route::resource('/profile','ProfileController');
Route::resource('/history','HistoryController');
Route::resource('/activity','ActivityController');
Route::resource('/population','PopulationController');

//-------Culture-------------//
Route::resource('/culture','CultureController');

//-------Improtant Events-------------//
Route::resource('/events','EventsController');

//-------Engineer-------------//
Route::resource('/engineer','EngineerController');

//-------Primary Focus-------------//
Route::resource('/focus','PrimaryFocusController');

//-------Education-------------//
Route::resource('/staff','SchoolStaffInfoController');
Route::resource('/student','SchoolStudentInfoController');
Route::resource('/school','SchoolInfraController');
Route::get('/json-group','SchoolStudentInfoController@group'); 

//---------Health-----------------//
Route::resource('/general','GeneralHealthController');
Route::resource('/morbidity','MorbidityController');

//---------Agriculture-----------------//
Route::resource('/agrigeneral','AgriGeneralController');
Route::resource('/agriproduction','AgriProductionController');
Route::get('/json-product','AgriProductionController@product'); 
Route::resource('/farmgroup','FarmGroupController');
Route::resource('/agrifacility','AgriFacilityController');
Route::resource('/landdevelopment','LandDevelopmentController');
Route::resource('/electricfencing','ElectricFencingController');
Route::resource('/farmroad','FarmRoadController');


//---------Livestock-----------------//
Route::resource('/livestockgeneral','LivestockGeneralController');
Route::resource('/livestockproduction','LivestockProductionController');
Route::resource('/livestockgroup','LivestockGroupController');
Route::resource('/livestockinfra','LivestockInfraController');
//Route::get('/json-product','AgriProductionController@product'); 

//Json populate dropdown
Route::get('/json-fyear','ActivityController@fyear'); 
Route::get('/json-subsector','SuperController@sub_sector');

Auth::routes();
Route::get('/', 'DashboardController@index')->name('dashboard');


Route::prefix('dashboard')->group(function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/home', 'DashboardController@index')->name('home');
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/populationage', 'DashboardController@populationage')->name('populationage');
    Route::get('/populationplace', 'DashboardController@populationplace')->name('populationplace');
    Route::get('/healthinfo', 'DashboardController@health_info')->name('health-info');
    Route::get('/morbidity', 'DashboardController@morbidity')->name('morbidity');
    Route::get('/morbidityby', 'DashboardController@morbidityby')->name('morbidityby');
    Route::get('/studentinfo', 'DashboardController@student_info')->name('studentinfo');
    Route::get('/studentinfoclass', 'DashboardController@student_info_class')->name('studentinfoclass');
    Route::get('/studentschool', 'DashboardController@student_sch')->name('studentschool');
    Route::get('/studentschoolinfo', 'DashboardController@student_school')->name('studentschoolinfo');
    Route::get('/schoolstaff', 'DashboardController@student_staff')->name('studentstaff');
    Route::get('/livestockgewog', 'DashboardController@livestock_gewog')->name('livestockgewog');
    Route::get('/livestock', 'DashboardController@livestock')->name('livestock');
    Route::get('/livestockproduct', 'DashboardController@livestock_product')->name('livestock-product');
    Route::get('/livestockinfra', 'DashboardController@livestock_infra')->name('livestockinfra');
    Route::get('/livestockgroup', 'DashboardController@livestock_group')->name('livestockgroup');
    Route::get('/livestockproductgewog', 'DashboardController@livestock_product_gewog')->name('livestockproductgewog');
    Route::get('/agriculture', 'DashboardController@agriculture')->name('agriculture');
    Route::get('/agriculturegewog', 'DashboardController@agriculture_gewog')->name('agriculture_gewog');
    Route::get('/agricultureproduct', 'DashboardController@agriculture_product')->name('agriculture_product');
    Route::get('/agricultureproductgewog', 'DashboardController@agriculture_product_gewog')->name('agriculture_product-gewog');
    Route::get('/agrifacilities', 'DashboardController@agri_facilities')->name('agri_facilities');
    Route::get('/agrifarmgroup', 'DashboardController@agri_farm_group')->name('agrifarmgroup');
    Route::get('/agriirrigation', 'DashboardController@agri_irrigation')->name('agriirrigation');
    Route::get('/agrielectricfencing', 'DashboardController@agri_electric_fencing')->name('agrielectricfencing');
    Route::get('/agrifarmroad', 'DashboardController@agri_farm_road')->name('agrifarmroad');
    Route::get('/landdevelopment', 'DashboardController@agri_land_development')->name('landdevelopment');
    Route::get('/employee_all', 'DashboardController@emp_all')->name('employee_all');
    Route::get('/employee_show/{token}', 'DashboardController@emp_show')->name('employee_show');
    Route::get('/employee_history/{token}', 'DashboardController@emp_history')->name('employee_history');
    Route::get('/activity_show/{token}', 'DashboardController@activity_show')->name('activity_show');
    Route::get('/site_visit/{token}', 'DashboardController@visit_history')->name('site_visit');
    Route::get('/activity_all', 'DashboardController@activity_show_all')->name('activity_show_all');
    Route::get('/focus_all', 'DashboardController@focus_all')->name('focus_all');
    Route::get('/culture_all', 'DashboardController@culture_all')->name('culture_all');
    Route::get('/culture_show/{token}', 'DashboardController@culture_show')->name('culture_show');
    Route::get('/schoollist', 'DashboardController@school_details')->name('school_details');
});

Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
Route::prefix('super')->group(function(){
    Route::get('/login','Auth\SuperLoginController@showLoginForm')->name('super.login');
    Route::post('/login','Auth\SuperLoginController@login')->name('super.login.submit');
    Route::get('/dashboard', 'SuperController@index')->name('super.dashboard');
    Route::get('/', 'SuperController@index')->name('super.dashboard');
    Route::get('/logout','Auth\SuperLoginController@superlogout')->name('super.logout');
    Route::post('/password/email','Auth\SuperForgotPasswordController@sendResetLinkEmail')->name('super.password.email');
    Route::post('/password/reset','Auth\SuperResetPasswordController@reset');
    Route::get('/password/reset','Auth\SuperForgotPasswordController@showLinkRequestForm')->name('super.password.request');
    Route::get('/password/reset/{token}','Auth\SuperResetPasswordController@showResetForm')->name('super.password.reset');
});
Route::prefix('user')->group(function(){
    Route::get('/logout','Auth\LoginController@userlogout')->name('user.logout');
});
//Route::resource('/administrator','SuperController');

/****Route::get('/administrator/view','SuperController@view')->name('list.administrator');
Route::get('/administrator/show','SuperController@create')->name('create.administrator');
Route::post('/administrator/store','SuperController@store')->name('store.administrator');***/

//Super-User
Route::resource('/users','SuperUserController');
Route::resource('/nusers','UserController');
Route::resource('/sector','MasterSectorController');
Route::resource('/subsector','MasterSubsectorController');
Route::resource('/designation','MasterDesignationController');
Route::resource('/qualification','MasterQualificationController');
Route::resource('/year','MasterYearController');
Route::resource('/status','MasterStatusController');
Route::resource('/schoollevel','MasterSchoollevelController');
Route::resource('/class','MasterClassController');
Route::resource('/studentage','MasterStudentageController');
Route::resource('/agricategory','MasterAgriCategoryController');
Route::resource('/agriproduct','MasterAgriProductController');
Route::resource('/fencing','MasterFencingController');
Route::resource('/channel','MasterChannelController');
Route::resource('/mode','MasterModeController');
Route::resource('/type','MasterTypeController');
Route::resource('/lstype','MasterLsTypeController');
Route::resource('/heritage','MasterHeritageController');
Route::get('/json-subsector','SuperUserController@sub_sector');


