<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Hash;
use Auth;
use App\Passport\Passport;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
}
