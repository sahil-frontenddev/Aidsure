<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('customer/signup', 'App\Http\Controllers\customers\SignupController@register');
Route::post('customer/login', 'App\Http\Controllers\customers\LoginController@login');
Route::post('admin/login', 'App\Http\Controllers\admin\LoginController@login');
Route::post('admin/logout', 'App\Http\Controllers\admin\LoginController@Logout');
Route::post('contact', 'App\Http\Controllers\HomeController@contact');
Route::get('testroutewsd', 'App\Http\Controllers\HomeController@testroutewsd');

Route::middleware('auth:api')->group(function () {

// Users

Route::get('admin/add', 'App\Http\Controllers\customers\AdminController@users');

// Centers

Route::post('admin/addcenters', 'App\Http\Controllers\admin\AdminController@addcenters');
Route::post('admin/addnewuser', 'App\Http\Controllers\admin\AdminController@addnewuser');
Route::get('admin/deletecenters', 'App\Http\Controllers\admin\AdminController@deletecenters');
Route::get('admin/hospitalstatus/{id}/{status}', 'App\Http\Controllers\admin\AdminController@hospitalstatus');
Route::get('admin/centerstatus/{id}/{status}', 'App\Http\Controllers\admin\AdminController@centerstatus');
Route::get('admin/orderstatus/{id}/{status}', 'App\Http\Controllers\admin\AdminController@orderstatus');

Route::get('admin/medicalstorestatus/{id}/{status}', 'App\Http\Controllers\admin\AdminController@medicalstorestatus');
Route::get('admin/laboratorystatus/{id}/{status}', 'App\Http\Controllers\admin\AdminController@laboratorystatus');
Route::get('admin/familystatus/{id}/{status}', 'App\Http\Controllers\admin\AdminController@familystatus');
Route::get('admin/deleteimage/{id}', 'App\Http\Controllers\admin\AdminController@deleteimage');

// Hospitals 

Route::post('admin/addhospital', 'App\Http\Controllers\admin\AdminController@addnewhospital');
Route::post('admin/addnewlaboratory', 'App\Http\Controllers\admin\AdminController@addnewlaboratory');
Route::post('admin/addnewmedicalstore', 'App\Http\Controllers\admin\AdminController@addnewmedicalstore');
Route::post('admin/createslide', 'App\Http\Controllers\admin\AdminController@createslide');
Route::post('admin/editslide', 'App\Http\Controllers\admin\AdminController@editslide');
Route::post('admin/uploadimage', 'App\Http\Controllers\admin\AdminController@uploadimage');

Route::post('customer/createfamily', 'App\Http\Controllers\customers\DashboardController@createfamily');
Route::post('customer/createmember', 'App\Http\Controllers\customers\DashboardController@createmember');
Route::post('customer/createorder', 'App\Http\Controllers\customers\DashboardController@createorder');
Route::post('customer/editorderapi', 'App\Http\Controllers\customers\DashboardController@editorderapi');
Route::post('uploadimage', 'App\Http\Controllers\customers\DashboardController@uploadimage');
Route::post('changepassword', 'App\Http\Controllers\customers\DashboardController@newchangepassword');

Route::get('admin/deleteorder/{id}/{status}', 'App\Http\Controllers\customers\DashboardController@deleteorder');


});


