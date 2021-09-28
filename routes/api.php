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

Route::middleware('auth:api')->group(function () {

// Users

Route::get('admin/add', 'App\Http\Controllers\customers\AdminController@users');

// Centers

Route::post('admin/addcenters', 'App\Http\Controllers\admin\AdminController@addcenters');
Route::get('admin/deletecenters', 'App\Http\Controllers\admin\AdminController@deletecenters');

// Hospitals 

Route::post('admin/addhospital', 'App\Http\Controllers\admin\AdminController@addnewhospital');

});


