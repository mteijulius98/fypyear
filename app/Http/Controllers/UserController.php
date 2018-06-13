<?php

namespace App\Http\Controllers;
use JWTAuth;
use JWTAuthException;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Config;
use DB;
class UserController extends Controller
{
   public function signup(Request $request){
       $this->validate($request,[
          'fname'=>'required',
          'mname'=>'required',
           'lname'=>'required',
           'email'=> 'required|email|unique:users',
           'password'=>'required',
           'role_id' =>'required'

       ]);
       $u = new User([
        'fname' => $request->input('fname'),
        'mname' => $request->input('mname'),
        'lname' => $request->input('lname'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'role_id' => $request->input('role_id'),
    ]);

    $u->save();

    $user=User::find($u->id);
    if($user->role->roinitial=='deo' || $user->role->roinitial=='slo'){
        $user->districts()->attach($request->input('district_id'));
    }
    elseif($user->role->roinitial=='weo'){
        $user->wards()->attach($request->input('ward_id'));
    }
    elseif($user->role->roinitial=='hos'){
        $user->schools()->attach($request->input('school_id'));

    }
 
    return response()->json([ 'message'=> 'User succsessfully created'],201);
   }
//    public function __construct()
//    {
//        $this->user =new User;
//        $this->duser =new Duser;
//    }
   public function signin(Request $request){
    $this->validate($request,[
        'email'=> 'required|email',
        'password'=>'required'
        
     ]);
     $credentials =$request->only('email','password'); 
     try{
        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json([ 'error'=> 'Invalid Credentials'],404);
        }
     } 
        catch(JWTException $e){
            return response()->json([ 'error'=> 'Could not create token'],500);
        }

   $user_roles=Role::select('roinitial')
   ->join('users','roles.id', '=', 'users.role_id')
   ->where('email','=',$request->email)->get();
   //$user_roles=User::select('role')->where([['email','=',$request->email],['password','=',$request->password],])->get();



               $role1='';
              foreach($user_roles as $role){
                 
                  $role1=$role->roinitial;

              }

    return response()->json(['token'=> $token,'roinitial'=>$role1],200);

       
        
        
}

public function getUsers(){
    $users = User::select('fname','mname','lname','email')
    ->where('role_id','=','2')
     ->orWhere('role_id','=','3')
     ->orWhere('role_id','=','4')
    ->get();
     $response = [
         'users' => $users
     ];
    return response()->json($response, 200);
   }
   public function getDusers(){
    $dusers=DB::table('users')->select('fname','lname','roles.roinitial','districts.dname')
    ->join('roles','users.role_id', '=', 'roles.id')
     ->join('district_user', 'users.id', '=', 'district_user.user_id')
      ->join('districts', 'users.id', '=', 'district_user.user_id')
    ->where('role_id', '=', '2')
    ->get();
     $response = [
         'dusers' => $dusers
     ];
    return response()->json($response, 200);
   }
    public function getSusers(){
    $susers=DB::table('users')->select('fname','lname','roles.roinitial','schools.name')
    ->join('roles','users.role_id', '=', 'roles.id')
    ->join('school_user', 'users.id', '=', 'school_user.user_id')
    ->join('schools', 'users.id', '=', 'school_user.user_id')
    ->where('role_id', '=', '3')
    ->get();
     $response = [
         'susers' => $susers
     ];
    return response()->json($response, 200);
   }
   public function getWusers(){
    $wusers=DB::table('users')->select('fname','lname','roles.roinitial','wards.wname')
    ->join('roles','users.role_id', '=', 'roles.id')
    ->join('user_ward', 'users.id', '=', 'user_ward.user_id')
    ->join('wards', 'users.id', '=', 'user_ward.user_id')
    ->where('role_id', '=', '4')
    ->get();
     $response = [
         'wusers' => $wusers
     ];
    return response()->json($response, 200);
   }
// public function getUsers(){
//     $users=DB::table('users')->select('fname','mname','lname','email','roles.roname','regions.rname','districts.dname','wards.wname')
//     ->join('regions', 'users.region_id', '=', 'regions.id')
//     ->join('districts', 'users.district_id', '=', 'districts.id')
//     ->join('wards', 'users.ward_id', '=', 'wards.id')
//     ->join('roles', 'users.role_id', '=', 'roles.id')
//     ->where('roles.roname','=','weo')
//     ->orWhere('roles.roname', 'deo')
//     ->orWhere('roles.roname', 'hos')
//     ->get();
//     $response = [
//                  'users' => $users
//              ];
//             return response()->json($response, 200);
// }
}
