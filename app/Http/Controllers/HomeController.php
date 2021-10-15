<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Hospital;
use App\Models\Order;
use App\Models\Laboratory;
use App\Models\Family;
use Illuminate\Http\Response;

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
    
    public function contact(Request $request){
        // print_r($request->all());
        $msg = $request->message;
        
       
        $msg = wordwrap($msg,70);
        
        
        $header = "FROM: ".$request->name." <".$request->nemail.">\r\n";
 
        if(mail('anujstaple@gmail.com',$request->subject,$msg,$header)){
            return (new Response(['status'=>'success'], '200'));
        }else{
            return (new Response(['status'=>'error'], '200'));
        }
        
    }
}
