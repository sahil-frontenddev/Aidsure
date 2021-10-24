<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;
use App\Models\Center;
use App\Models\Hospital;
use App\Models\Order;
use App\Models\Laboratory;
use App\Models\Medicalstore;
use App\Models\Slide;
use App\Models\Family;
use App\Models\Gallery;

class AdminController extends Controller
{
    public function __construct()
    {

        if(Auth::check() && Auth::user() != null) {
            
            if(Auth::user()->role == "admin" || Auth::user()->role == "subadmin"){
                return View('admin.dashboard');
            }
            else{
                return View('admin.login');
            }

            
        }
        else{

            return View('admin.login');
        }
       
    }
    public function index(){

        $users = User::whereIn('role',['admin','subadmin'])->get();

        if(Auth::check() && Auth::user()->role == "admin") {

           return view('admin.users',['users'=>$users]);
        }
        else{

            return View('admin.login');
        }

        
    }

    public function dashboard(){
        
        if(Auth::check() && Auth::user() != null) {
            
            if(Auth::user()->role == "admin" || Auth::user()->role == "subadmin"){
                return View('admin.dashboard');
            }
            else{
                return View('admin.login');
            }

            
        }
        else{

            return View('admin.login');
        }
    }
    
    public function centers(){
     $centers = User::where('role','customer')->orderby('id','desc')->get();
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
        
        $input['email'] = $request->youremail;
        $input['phone'] = $request->phone;
        
        $rules = array('email' => 'email','phone' => 'required|size:10');

        $validator = Validator::make($input, $rules);
        // print_r($validator->errors()->first()); die;
        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>$validator->errors()->first()], '200'));
        }
        $user = new User();
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
        $centers = Hospital::orderby('id','asc')->get();
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
        
        $input['email'] = $request->youremail;
        $input['phone'] = $request->phone;
        
        $rules = array('email' => 'email','phone' => 'required|size:10');

        $validator = Validator::make($input, $rules);
        // print_r($validator->errors()->first()); die;
        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>$validator->errors()->first()], '200'));
        }
        
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

    public function orders(){
        $family = Order::where('order_status','active')->orderby('id','desc')->get();

        if(Auth::check() && Auth::user()->role == "admin"  || Auth::user()->role == "subadmin") {

            return view('admin.orders',['family'=>$family]);
        }
        else{

            return View('admin.login');
        }
         
    }

    public function hospitalstatus($id,$status){

        $hospital = Hospital::find($id);

        $hospital->status = $status;

        $hospital->save();

        return (new Response(['status'=>'success'], '200'));

    }

    public function centerstatus($id,$status){

        $center = User::find($id);

        $center->status = $status;

        $center->save();

        return (new Response(['status'=>'success'], '200'));

    }

    public function orderstatus($id,$status){

        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order->status = $status;

        if($order->save()){
            $msg = 'You Order is '.$status;
            $msg = wordwrap($msg,70);
            
            $header = "FROM: ".Auth::user()->name." <".Auth::user()->email.">\r\n";
     
            if(mail($user->email,'Order Status',$msg,$header)){
                return (new Response(['status'=>'success'], '200'));
            }else{
                return (new Response(['status'=>'error'], '200'));
            }
        }
        else{
            
            return (new Response(['status'=>'error'], '200'));
        }
      

    }

    public function laboratorystatus($id,$status){

        $order = Laboratory::find($id);

        $order->status = $status;

        $order->save();

        return (new Response(['status'=>'success'], '200'));

    }
    public function medicalstorestatus($id,$status){

        $order = Medicalstore::find($id);

        $order->status = $status;

        $order->save();

        return (new Response(['status'=>'success'], '200'));

    }


    public function laboratory(){
        $centers = Laboratory::orderby('id','desc')->get();
        if(Auth::check() && Auth::user()->role == "admin") {

             return view('admin.laboratory',['centers'=>$centers]);
        }
        else{

            return View('admin.login');
        }
 
    }
    public function addlaboratory(){
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.newlaboratory');
        }
        else{

            return View('admin.login');
        }

    }

    public function addnewlaboratory(Request $request){
        
        $input['email'] = $request->youremail;
        $input['phone'] = $request->phone;
        
        $rules = array('email' => 'email','phone' => 'required|size:10');


        $validator = Validator::make($input, $rules);
        // print_r($validator->errors()->first()); die;
        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>$validator->errors()->first()], '200'));
        }
        

        $user = new Laboratory();
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


    public function medicalstores(){
        $centers = Medicalstore::orderby('id','desc')->get();
        if(Auth::check() && Auth::user()->role == "admin") {

             return view('admin.medicalstores',['centers'=>$centers]);
        }
        else{

            return View('admin.login');
        }
        // return view('admin.hospitals',['centers'=>$centers]);
    }
    public function addmedicalstore(){
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.newmedicalstore');
        }
        else{

            return View('admin.login');
        }
        // return view('admin.newhospital');
    }

    public function addnewmedicalstore(Request $request){
        
        $input['email'] = $request->youremail;
        $input['phone'] = $request->phone;
        
        $rules = array('email' => 'email','phone' => 'required|size:10');

        $validator = Validator::make($input, $rules);
        // print_r($validator->errors()->first()); die;
        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>$validator->errors()->first()], '200'));
        }
        
        $user = new Medicalstore();
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

    public function addslide(){
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.createslide');
        }
        else{

            return View('admin.login');
        }
        
    }

    public function createslide(Request $request){

        $Slide = new Slide();
        $Slide->title = $request->title;
        $Slide->description = $request->description;
        $Slide->image = $request->attachimage;
        
        if($Slide->save()){
           
            return (new Response(['status'=>'success'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Registration failed!'], '200'));
        }

    }
    public function editslideview($id){

        $slide = Slide::where('id',$id)->first();
        // print_r($slide);die;
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.editslide',['slide'=>$slide]);
        }
        else{

            return View('admin.login');
        }
        
    }
    public function editslide(Request $request){

        $Slide = Slide::find($request->id);
        $Slide->title = $request->title;
        $Slide->description = $request->description;
        $Slide->image = $request->attachimage;
        
        if($Slide->save()){
           
            return (new Response(['status'=>'success'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Registration failed!'], '200'));
        }

    }

    public function slides(){
        $centers = Slide::orderby('id','desc')->get();
        if(Auth::check() && Auth::user()->role == "admin") {

             return view('admin.slides',['centers'=>$centers]);
        }
        else{

            return View('admin.login');
        }
        // return view('admin.hospitals',['centers'=>$centers]);
    }

    public function viewcenters($id){
        $centers = User::where('id',$id)->first();
         if(Auth::check() && Auth::user()->role == "admin") {

               return view('admin.viewcenter',['center'=>$centers]);
            }
            else{

                return View('admin.login');
            }
    }


        public function hospitalview($id){
        $centers = Hospital::where('id',$id)->first();
         if(Auth::check() && Auth::user()->role == "admin") {

               return view('admin.hospitalview',['center'=>$centers]);
            }
            else{

                return View('admin.login');
            }

    }

    public function laboratoryview($id){
        $centers = Laboratory::where('id',$id)->first();
         if(Auth::check() && Auth::user()->role == "admin") {

               return view('admin.laboratoryview',['center'=>$centers]);
            }
            else{

                return View('admin.login');
            }

    }
    public function storeview($id){
        $centers = Medicalstore::where('id',$id)->first();
         if(Auth::check() && Auth::user()->role == "admin") {

               return view('admin.storeview',['center'=>$centers]);
            }
            else{

                return View('admin.login');
            }

    }
    public function orderview($id){
        $centers = Order::where('id',$id)->first();
         if(Auth::check() && Auth::user()->role == "admin"  || Auth::user()->role == "subadmin") {

               return view('admin.orderview',['center'=>$centers]);
            }
            else{

                return View('admin.login');
            }

    }

    public function changepassword(){
        if(Auth::check() && Auth::user()->role == "admin") {

             return view('admin.changepassword');
        }
        else{

            return View('admin.login');
        }
    }

    public function family(){
        $family = Family::with('getmembers')->get();
        
        if(Auth::check() && Auth::user()->role == "admin"  || Auth::user()->role == "subadmin") {

             return view('admin.family',['family'=>$family]);
        }
        else{

            return View('admin.login');
        }
        
    }
    public function viewfamily($id){
        $family = Family::where('id',$id)->with('getmembers')->first();
        // print_r($family);
        
        // $pdf = PDF::loadView('customers.viewfamily',compact('family'));
        //     return $pdf->download('pdfview.pdf');

        if(Auth::check() && Auth::user()->role == "admin"  || Auth::user()->role == "subadmin") {

             return view('admin.viewfamily',['family'=>$family]);
        }
        else{

            return View('customers.login');
        }
        
    }
    public function familystatus($id,$status){

        $hospital = Family::find($id);

        $hospital->status = $status;

        $hospital->save();

        return (new Response(['status'=>'success'], '200'));

    }

    public function gallery(){
        $gallery = Gallery::get();
        
        if(Auth::check() && Auth::user()->role == "admin") {

             return view('admin.gallery',['gallery'=>$gallery]);
        }
        else{

            return View('customers.login');
        }
        
    }

    public function uploadimage(Request $request){

            $imagename = uniqid().'.png';
            $img = Image::make( $request->attachimage); 
            $img->save(public_path().'/'.$imagename); 

            $galllery = new Gallery();
            $galllery->name = $imagename;
            $galllery->save();
            return response()->json([
                'status' => 'success',
                'image'=>$imagename
            ]);
    }

    public function deleteimage($id){

            Gallery::find($id)->delete();
            return response()->json([
                'status' => 'success'
                
            ]);
    }

    public function newuser(){
        if(Auth::check() && Auth::user()->role == "admin") {

            return View('admin.addnewuser');
        }
        else{

            return View('admin.login');
        }

    }

    public function addnewuser(Request $request){
        
        $input['email'] = $request->youremail;
        $input['phone'] = $request->phone;
        
        $rules = array('email' => 'email','phone' => 'required|size:10');

        $validator = Validator::make($input, $rules);
        // print_r($validator->errors()->first()); die;
        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>$validator->errors()->first()], '200'));
        }

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->youremail;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'subadmin';

        if($user->save()){
           
            return (new Response(['status'=>'success'], '200'));
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Registration failed!'], '200'));
        }
    }

}
