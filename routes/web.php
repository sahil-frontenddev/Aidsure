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

Route::get('/', function () {
    return view('frontend.home');
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

//Customer

Route::get('customer/family', 'App\Http\Controllers\customers\DashboardController@customer_family')->name('customer_family'); 
Route::get('customer/newfamily', 'App\Http\Controllers\customers\DashboardController@customer_newfamily')->name('customer_newfamily'); 
Route::get('customer/viewfamily/{id}', 'App\Http\Controllers\customers\DashboardController@viewfamily')->name('viewfamily'); 
Route::get('customer/downloadpdf/{id}', 'App\Http\Controllers\customers\DashboardController@downloadpdf')->name('downloadpdf'); 

Route::get('customer/orders', 'App\Http\Controllers\customers\DashboardController@customer_order')->name('customer_order'); 
Route::get('customer/neworder', 'App\Http\Controllers\customers\DashboardController@customer_neworder')->name('customer_neworder');



// Route::get('/customer/login', function () {
//     return View('customers.login');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
