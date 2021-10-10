<?php

namespace App\Http\Controllers\customers;

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
class SignupController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        // $this->middleware('auth');
       
    }

    public function index(){

        if(Auth::check() && Auth::user()->role == "customer") {
            return View('customers.dashboard');
        }
        else{

            return View('customers.signup');
        }
    }

    public function register(Request $request){
        // die("here");
        $input['email'] = $request->youremail;
        $rules = array('email' => 'unique:users,email');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return (new Response(['status'=>'error','msg'=>'Email already exists!'], '200'));
        }
        $fam = User::where('role','customer')->get();
        
        $stnum = '00';
        $countnm = strval(count($fam)+1);
        $newf_id = $stnum.$countnm;
        $user = new User();
        $user->name = $request->username;
        $user->unique_number = $newf_id;
        $user->email = $request->youremail;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'customer';

        if($user->save()){
            if (Auth::attempt(['email' => $request->youremail, 'password' => $request->password])) {
                $token = $user->createToken('my token');
                return (new Response(['status'=>'success','token'=>$token], '200'));
            }
            else{
                return (new Response(['status'=>'error','msg'=>'Registration failed!'], '200'));
            }
        }
        else{
            return (new Response(['status'=>'error','msg'=>'Registration failed!'], '200'));
        }
    }
}
 