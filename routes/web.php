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
//Route::get('/page','PagesController@index');
//Route::get('/history','HistoryController@index');
Route::resource('/profile','ProfileController');
Route::resource('/history','HistoryController');
Route::resource('/activity','ActivityController');
Route::resource('/population','PopulationController');


//-------Education-------------//
Route::resource('/staff','SchoolStaffInfoController');
Route::resource('/student','SchoolStudentInfoController');
Route::get('/json-group','SchoolStudentInfoController@group'); 

//---------Health-----------------//
Route::resource('/general','GeneralHealthController');
Route::resource('/morbidity','MorbidityController');

//---------Agriculture-----------------//
Route::resource('/agrigeneral','AgriGeneralController');
Route::resource('/agriproduction','AgriProductionController');
Route::get('/json-product','AgriProductionController@product'); 

//---------Livestock-----------------//
Route::resource('/livestockgeneral','LivestockGeneralController');
Route::resource('/livestockproduction','LivestockProductionController');
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
    Route::get('/studentschool', 'DashboardController@student_sch')->name('studentschool');
    Route::get('/schoolstaff', 'DashboardController@student_staff')->name('studentstaff');
    Route::get('/livestockgewog', 'DashboardController@livestock_gewog')->name('livestockgewog');
    Route::get('/livestock', 'DashboardController@livestock')->name('livestock');
    Route::get('/livestockproduct', 'DashboardController@livestock_product')->name('livestock-product');
    Route::get('/livestockproductgewog', 'DashboardController@livestock_product_gewog')->name('livestockproductgewog');
    Route::get('/agriculture', 'DashboardController@agriculture')->name('agriculture');
    Route::get('/agriculturegewog', 'DashboardController@agriculture_gewog')->name('agriculture_gewog');
    Route::get('/agricultureproduct', 'DashboardController@agriculture_product')->name('agriculture_product');
    Route::get('/agricultureproductgewog', 'DashboardController@agriculture_product_gewog')->name('agriculture_product-gewog');
    Route::get('/employee_all', 'DashboardController@emp_all')->name('employee_all');
    Route::get('/employee_show/{token}', 'DashboardController@emp_show')->name('employee_show');
    Route::get('/employee_history/{token}', 'DashboardController@emp_history')->name('employee_history');
    Route::get('/activity_show/{token}', 'DashboardController@activity_show')->name('activity_show');
});

Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
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
    Route::get('/logout','Auth\AdminLoginController@login')->name('super.logout');
    Route::post('/password/email','Auth\SuperForgotPasswordController@sendResetLinkEmail')->name('super.password.email');
    Route::post('/password/reset','Auth\SuperResetPasswordController@reset');
    Route::get('/password/reset','Auth\SuperForgotPasswordController@showLinkRequestForm')->name('super.password.request');
    Route::get('/password/reset/{token}','Auth\SuperResetPasswordController@showResetForm')->name('super.password.reset');
});
//Route::resource('/administrator','SuperController');

/****Route::get('/administrator/view','SuperController@view')->name('list.administrator');
Route::get('/administrator/show','SuperController@create')->name('create.administrator');
Route::post('/administrator/store','SuperController@store')->name('store.administrator');***/

//Super-Admin-User
Route::resource('/users','SuperUserController');
Route::get('/json-subsector','SuperUserController@sub_sector');


