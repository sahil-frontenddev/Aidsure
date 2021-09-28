<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Hash;
use Auth;
use App\Passport\Passport;
use App\Models\User;
use App\Models\Postalcodes;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class LoginController extends Controller
{
    
    public function index(){

  
    // foreach ($data as $item){
    //     if($item->stateISO != "ON"){ 
    //         $createpostalcode = new Postalcodes();
    //         $createpostalcode->province = $item->stateISO;
    //         $createpostalcode->city = $item->city;
    //         $createpostalcode->postal_code = $item->zipCode;
    //         $createpostalcode->sub_postal_code = substr($item->zipCode,0,3);
    //         $createpostalcode->save();
    //     }   
    //     }

        if(Auth::check() && Auth::user()->role == "customer") {
            return View('customers.dashboard');
        }
        else{

            return View('customers.login');
        }
        // return View('customers.login');
    }

    public function login(Request $request){
        
        $useremail = $request->useremail;
        $userpass = $request->userpassword;
        
        if (Auth::attempt(['email' => $useremail, 'password' => $userpass])) {
            $token = Auth::user()->createToken('my token');
            return (new Response(['status'=>'success','token'=>$token], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Wrong Credentials!'], '200'));
        }
       
    }

}
