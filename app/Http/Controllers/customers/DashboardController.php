<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use App\Passport\Passport;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class DashboardController extends Controller
{
    
    public function index(){
        if(Auth::check() && Auth::user()->role == "customer") {
            return View('customers.dashboard');
        }
        else{

            return View('customers.login');
        }
        // return View('customers.dashboard');
    }

    
}
 