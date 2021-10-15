<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Hash;
use App\Passport\Passport;
use App\Models\User;
use App\Models\Family;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Intervention\Image\ImageManagerStatic as Image;

use PDF;

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

    public function customer_family(){
        $family = Family::with('getmembers')->orderby('id','desc')->get();

        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.family',['family'=>$family]);
        }
        else{

            return View('customers.login');
        }
        
    }

    public function viewfamily($id){
        $family = Family::where('id',$id)->with('getmembers')->first();
        // print_r($family);
        
        // $pdf = PDF::loadView('customers.viewfamily',compact('family'));
        //     return $pdf->download('pdfview.pdf');

        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.viewfamily',['family'=>$family]);
        }
        else{

            return View('customers.login');
        }
        
    }

    public function downloadpdf($id){
        $family = Family::where('id',$id)->with('getmembers')->first();
        $pdf = PDF::loadView('customers.downloadpdf',compact('family'));
        return $pdf->download('pdfview.pdf');
    }

    public function customer_newfamily(Request $request){
        

        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.addfamily');
        }
        else{

            return View('customers.login');
        }	
    }

    public function createfamily(Request $request){
        $fam = Family::get();
        $family = new Family();
        $stnum = '00';
        $countnm = strval(count($fam)+1);
        $newf_id = $stnum.$countnm;
        // echo $newf_id; die;
        $family->family_id = $newf_id;
        // $family->rnf = $request->r_number;
        $family->st_address = $request->st_address;
        $family->city = $request->city;
        $family->state = $request->state;
        $family->address = $request->address;
        $family->phone = $request->phone;
        $family->email = $request->email;
        $family->country = $request->country;
        $family->date = $request->date;

        if($family->save()){
            foreach($request->member as $item){
                $member = new Member();

                $member->family_id = $family->id;
                $member->name = $item['name'];
                $member->adhar = $item['adh'];
                // $member->signature = $item['sign'];
                $member->save();
            }
        return (new Response(['status'=>'success','msg'=>'Success!'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Error!'], '200'));
        }

    }

    public function customer_neworder (){
        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.createorder');
        }
        else{

            return View('customers.login');
        }
        
    }

    public function customer_order(){
        $family = Order::orderby('id','desc')->get();

        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.orders',['family'=>$family]);
        }
        else{

            return View('customers.login');
        }
         
    }

    public function createorder(Request $request){

        $order = new Order();
        $user_unique_id = Auth::user()->unique_number;
        $order->tablets = $request->tablets;
        $order->center_id = $user_unique_id;
        $order->capsules = $request->capsules;
        $order->syrup = $request->syrup;
        $order->injection = $request->injection;
        $order->sergical = $request->sergical;
        $order->image = $request->attachimage;
       
        if($order->save()){
        
        return (new Response(['status'=>'success','msg'=>'Success!'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Error!'], '200'));
        }

    }

    public function uploadimage(Request $request){

            $imagename = uniqid().'.png';
            $img = Image::make( $request->attachimage); 
            $img->save(public_path().'/'.$imagename); 

            return response()->json([
                'status' => 'success',
                'image'=>$imagename
            ]);
    }

    public function changepassword(){
        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.changepassword');
        }
        else{

            return View('customers.login');
        }
    }

    public function newchangepassword(Request $request){

        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);

        $user->save();

        return (new Response(['status'=>'success','msg'=>'Success!'], '200'));

    }

        public function orderview($id){
        $centers = Order::where('id',$id)->first();
         if(Auth::check() && Auth::user()->role == "customer") {

               return view('customers.orderview',['center'=>$centers]);
            }
            else{

                return View('customers.login');
            }

    }
    
}
 