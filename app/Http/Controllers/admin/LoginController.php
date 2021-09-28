<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Hash;
use Auth;
use Validator;
use App\Passport\Passport;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Passport\HasApiTokens;

class LoginController extends Controller
{
    public function index(){

        if(Auth::check() && Auth::user()->role == "admin") {
            return View('admin.dashboard');
            
        }
        else{

            return View('admin.login');
        }
    }

    public function login(Request $request){
        
        // $useremail = $request->useremail;
        // $userpass = $request->userpassword;
        $login_credentials=[
            'email'=>$request->useremail,
            'password'=>$request->userpassword,
        ];
        if(auth()->attempt($login_credentials)){
            //generate the token for the user
            $user = Auth::user();
            $user_login_token = $user->createToken('MyApp')->accessToken;
            return (new Response(['status'=>'success','token'=>$user_login_token], '200'));
           } 
           else{
            return (new Response(['status'=>'error','msg'=>'Wrong Credentials!'], '200'));
        }
        // if (Auth::attempt(['email' => $useremail, 'password' => $userpass])) {
        //     $tokenobj = Auth::user()->createToken('my token');
        //     $token = $tokenobj->accessToken;
        //     return (new Response(['status'=>'success','token'=>$tokenobj], '200'));
        // }
        // else{
        //     return (new Response(['status'=>'error','msg'=>'Wrong Credentials!'], '200'));
        // }
       
    }

    public function Logout(){
        
        Auth::logout();

        return (new Response(['status'=>'success'], '200'));
    }
}
