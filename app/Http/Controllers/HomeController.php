<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Hospital;
use App\Models\Order;
use App\Models\Laboratory;
use App\Models\Family;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('frontend.home');
    }
    public function hospital()
    {
        
        return view('frontend.hospital');
    }
}
