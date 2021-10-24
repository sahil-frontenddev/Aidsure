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
use Validator;
use App\Models\Member;
use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Intervention\Image\ImageManagerStatic as Image;

use PDF;

class DashboardController extends Controller
{
    
    public function index(){
        // print_r(Auth::guard('api')->user());die;
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

    public function customer_editfamily($id){
        $members = Member::where('family_id',$id)->get();
        if(Auth::check() && Auth::user()->role == "customer") {
            return view('customers.editfamily',['id'=>$id,'members'=>$members]); 
        }
        else{

            return View('customers.login');
        }   
    }


    public function createfamily(Request $request){
        
        $input['email'] = $request->email;
        $input['phone'] = $request->phone;
        
        $rules = array('email' => 'email','phone' => 'required|size:10');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>$validator->errors()->first()], '200'));
        }

        $fam = Family::get();
        $family = new Family();
        $stnum = '00';
        $countnm = strval(count($fam)+1);
        $newf_id = $stnum.$countnm;
        $family->family_id = $newf_id;
        $family->user_id = Auth::user()->id;
        $family->st_address = $request->st_address;
        $family->city = $request->city;
        $family->name = $request->f_name;
        $family->state = $request->state;
        $family->address = $request->address;
        $family->phone = $request->phone;
        $family->email = $request->email;
        $family->country = $request->country;
        $family->date = $request->date;

        if($family->save()){
           
            return (new Response(['status'=>'success','msg'=>'Success!','id'=>$family->id], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Error!'], '200'));
        }

    }

    public function createmember(Request $request){

        $input['adhaar'] = $request->adhaar;
        
        $rules = array('adhaar' => 'required|min:6');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>$validator->errors()->first()], '200'));
        }

        $member = new Member();
        $member->family_id = $request->family_id;
        $member->name = $request->name;
        $member->adhar = $request->adhaar;
        if($member->save()){
           
            return (new Response(['status'=>'success','msg'=>'Success!'], '200'));
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
    public function customer_editorder ($id){

        $family = Order::where('id',$id)->first();
        $medicine = Medicine::where('order_id',$id)->get();

        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.editorder',['family'=>$family,'id'=>$id,'medicine'=>$medicine]);
        }
        else{

            return View('customers.login');
        }
        
    }

    public function customer_order(){

        $family = Order::where('order_status','active')->orderby('id','desc')->get();

        if(Auth::check() && Auth::user()->role == "customer") {

             return view('customers.orders',['family'=>$family]);
        }
        else{

            return View('customers.login');
        }
         
    }

    public function createorder(Request $request){
        // print_r($request->rnf); die;
        $order = new Order();
        $user_unique_id = Auth::user()->unique_number;
        $order->center_id = $user_unique_id;
        $order->user_id = Auth::user()->id;
        $order->family_id = $request->rnf;
    
        if($order->save()){
            $msg = 'New Order Created By '.Auth::user()->name;
            $msg = wordwrap($msg,70);
            
            $header = "FROM: ".Auth::user()->name." <".Auth::user()->email.">\r\n";
     
            if(mail('aidsure2022@gmail.com','New Order',$msg,$header)){
                return (new Response(['status'=>'success','id'=>$order->id], '200'));
            }else{
                return (new Response(['status'=>'error'], '200'));
            }
        
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Error!'], '200'));
        }

    }

    public function deleteorder($id,$status){

        $order = Order::find($id);
        
    
        if($order->delete()){  
            return (new Response(['status'=>'success'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Error!'], '200'));
        }

    }

    public function editorderapi(Request $request){

        $order = new Medicine();
        $order->order_id = $request->order_id;
        $order->type = $request->medname;
        $order->name = $request->name;
        $order->quantity = $request->quantity;
        $order->image = $request->attachimage;
    
        if($order->save()){
             $order = Order::find($request->order_id);
             $order->order_status = "active";
             $order->save();
             return (new Response(['status'=>'success'], '200')); 
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
        // print_r($centers);  
         if(Auth::check() && Auth::user()->role == "customer") {

               return view('customers.orderview',['center'=>$centers]);
            }
            else{

                return View('customers.login');
            }

    }
    
}
 