<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;
use Hash;
use App\Models\User;
use App\Models\Center;
use App\Models\Hospital;

class AdminController extends Controller
{
    public function __construct()
    {

        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.dashboard');
        }
        else{

            return View('admin.login');
        }
       
    }
    public function index(){

        $users = User::where('role','customer')->get();

        return view('admin.users',['users'=>$users]);
    }

    public function dashboard(){
        
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.dashboard');
        }
        else{

            return View('admin.login');
        }
    }
    
    public function centers(){
     $centers = Center::where('role','customer')->get();
     if(Auth::check() && Auth::user()->role == "admin") {

           return view('admin.centers',['centers'=>$centers]);
        }
        else{

            return View('admin.login');
        }
     return view('admin.centers',['centers'=>$centers]);
    }

    public function newcenters(){
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.newcenters');
        }
        else{

            return View('admin.login');
        }

     return view('admin.newcenters');
    }

    public function addcenters(Request $request){

        $user = new Center();
        $user->name = $request->username;
        $user->email = $request->youremail;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'customer';

        if($user->save()){
           
            return (new Response(['status'=>'success'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Registration failed!'], '200'));
        }
    }

    public function hospitals(){
        $centers = Hospital::get();
        if(Auth::check() && Auth::user()->role == "admin") {

             return view('admin.hospitals',['centers'=>$centers]);
        }
        else{

            return View('admin.login');
        }
        return view('admin.hospitals',['centers'=>$centers]);
    }
    public function addhospitals(){
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.newhospital');
        }
        else{

            return View('admin.login');
        }
        return view('admin.newhospital');
    }

    public function addnewhospital(Request $request){

        $user = new Hospital();
        $user->name = $request->username;
        $user->email = $request->youremail;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->speciality = $request->speciality;
        $user->doctor_name = $request->doctor_name;

        if($user->save()){
           
            return (new Response(['status'=>'success'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Registration failed!'], '200'));
        }

    }

}
