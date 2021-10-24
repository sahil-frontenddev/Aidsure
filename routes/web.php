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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/about-us', function () {
    return view('frontend.about');
});

Route::get('/hospitals', function () {
    return view('frontend.hospitals');
});
Route::get('/medical-stores', function () {
    return view('frontend.stores');
});
Route::get('/laboratories', function () {
    return view('frontend.laboratory');
});
//Customer

Route::get('customer/login', 'App\Http\Controllers\customers\LoginController@index')->name('customer_login');
Route::get('customer/signup', 'App\Http\Controllers\customers\SignupController@index')->name('customer_signup');
Route::get('customer/dashboard', 'App\Http\Controllers\customers\DashboardController@index')->name('customer_dashboard');

// Admin
Route::get('admin/login', 'App\Http\Controllers\admin\LoginController@index')->name('admin_login');

// Admin

Route::get('admin/dashboard', 'App\Http\Controllers\admin\AdminController@dashboard')->name('admin_dashboard'); 
Route::get('admin/users', 'App\Http\Controllers\admin\AdminController@index')->name('admin_users'); 
Route::get('admin/centers', 'App\Http\Controllers\admin\AdminController@centers')->name('admin_centers'); 
Route::get('admin/newcenters', 'App\Http\Controllers\admin\AdminController@newcenters')->name('admin_newcenters'); 
Route::get('admin/hospitals', 'App\Http\Controllers\admin\AdminController@hospitals')->name('admin_hospitals'); 
Route::get('admin/addhospitals', 'App\Http\Controllers\admin\AdminController@addhospitals')->name('admin_addhospitals'); 
Route::get('admin/orders', 'App\Http\Controllers\admin\AdminController@orders')->name('admin_orders');
Route::get('admin/laboratory', 'App\Http\Controllers\admin\AdminController@laboratory')->name('admin_laboratory'); 
Route::get('admin/addlaboratory', 'App\Http\Controllers\admin\AdminController@addlaboratory')->name('admin_addlaboratory'); 
Route::get('admin/medicalstores', 'App\Http\Controllers\admin\AdminController@medicalstores')->name('admin_medicalstores'); 
Route::get('admin/addmedicalstore', 'App\Http\Controllers\admin\AdminController@addmedicalstore')->name('admin_addmedicalstore'); 
Route::get('admin/slides', 'App\Http\Controllers\admin\AdminController@slides')->name('admin_slides'); 
Route::get('admin/addslide', 'App\Http\Controllers\admin\AdminController@addslide')->name('admin_addslide'); 
Route::get('admin/editslide/{id}', 'App\Http\Controllers\admin\AdminController@editslideview')->name('admin_editslideview'); 
Route::get('admin/viewcenter/{id}', 'App\Http\Controllers\admin\AdminController@viewcenters')->name('admin_viewcenters'); 
Route::get('admin/hospitalview/{id}', 'App\Http\Controllers\admin\AdminController@hospitalview')->name('admin_hospitalview'); 
Route::get('admin/laboratoryview/{id}', 'App\Http\Controllers\admin\AdminController@laboratoryview')->name('admin_laboratoryview'); 
Route::get('admin/storeview/{id}', 'App\Http\Controllers\admin\AdminController@storeview')->name('admin_storeview'); 
Route::get('admin/orderview/{id}', 'App\Http\Controllers\admin\AdminController@orderview')->name('admin_orderview'); 
Route::get('admin/changepassword', 'App\Http\Controllers\admin\AdminController@changepassword')->name('admin_changepassword');
Route::get('admin/family', 'App\Http\Controllers\admin\AdminController@family')->name('admin_family');
Route::get('admin/viewfamily/{id}', 'App\Http\Controllers\admin\AdminController@viewfamily')->name('admin_viewfamily');
Route::get('admin/gallery', 'App\Http\Controllers\admin\AdminController@gallery')->name('admin_gallery');
Route::get('admin/newuser', 'App\Http\Controllers\admin\AdminController@newuser')->name('admin_newuser');
//Customer

Route::get('customer/family', 'App\Http\Controllers\customers\DashboardController@customer_family')->name('customer_family'); 
Route::get('customer/newfamily', 'App\Http\Controllers\customers\DashboardController@customer_newfamily')->name('customer_newfamily'); 
Route::get('customer/editfamily/{id}', 'App\Http\Controllers\customers\DashboardController@customer_editfamily')->name('customer_editfamily'); 
Route::get('customer/viewfamily/{id}', 'App\Http\Controllers\customers\DashboardController@viewfamily')->name('viewfamily'); 
Route::get('customer/downloadpdf/{id}', 'App\Http\Controllers\customers\DashboardController@downloadpdf')->name('downloadpdf');
Route::get('customer/orderview/{id}', 'App\Http\Controllers\customers\DashboardController@orderview')->name('admin_orderview'); 

Route::get('customer/orders', 'App\Http\Controllers\customers\DashboardController@customer_order')->name('customer_order'); 
Route::get('customer/neworder', 'App\Http\Controllers\customers\DashboardController@customer_neworder')->name('customer_neworder');
Route::get('customer/neworder', 'App\Http\Controllers\customers\DashboardController@customer_neworder')->name('customer_neworder');
Route::get('customer/neworder/{id}', 'App\Http\Controllers\customers\DashboardController@customer_editorder')->name('customer_editneworder');
Route::get('customer/changepassword', 'App\Http\Controllers\customers\DashboardController@changepassword')->name('customer_changepassword');



// Route::get('/customer/login', function () {
//     return View('customers.login');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
