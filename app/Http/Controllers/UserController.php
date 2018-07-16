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
        $user->districts()->attach($request->input('station_id'));
    }
    elseif($user->role->roinitial=='weo'){
        $user->wards()->attach($request->input('station_id'));
    }
    elseif($user->role->roinitial=='hos'){
        $user->schools()->attach($request->input('school_id'));

    }
 
    return response()->json([ 'message'=> 'User succsessfully created'],201);
   }
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
      $user_station=DB::table('district_user')->select('district_id')
      ->join('users','district_user.user_id', '=', 'users.id')
      ->where('email', '=',$request->email)->get();
      $district1='';
      foreach ($user_station as  $the_id) {
        $district1=$the_id->district_id;
      }
       $user_weo=DB::table('user_ward')->select('ward_id')
      ->join('users','user_ward.user_id', '=', 'users.id')
      ->where('email', '=',$request->email)->get();
      $ward1='';
      foreach ($user_weo as  $the_wid) {
        $ward1=$the_wid->ward_id;
      }
       
    return response()->json(['token'=> $token,'roinitial'=>$role1, 'district_id'=>$district1,'ward_id'=>$ward1],200);

       
        
        
}
 public function deleteUser($id)
    {
        $u = User::find($id);
        $u ->delete();
        return response()->json(['message'=> 'User deleted'], 200);
    }
      public function putUser(Request $request, $id){
        $u = User::find($id);
        if(!$u){
            return response()->json(['message'=> 'User not found'], 404);
        }
        $u ->fname = $request->input('fname');
        $u ->mname = $request->input('mname');
        $u ->lname = $request->input('lname');
        $u ->email = $request->input('email');
        $u ->save();
        return response()->json(['u'=>$u], 200);
    }

public function getUsers(){
    $users = User::select('fname','mname','lname','email')
    ->where('role_id','=','2')
     ->orWhere('role_id','=','3')
     ->orWhere('role_id','=','4')
     ->orWhere('role_id','=','5')
    ->get();
     $response = [
         'users' => $users
     ];
    return response()->json($response, 200);
   }
  
   public function getDusers(){
    $dusers=DB::table('district_user')->select('users.id','users.fname','users.lname','roles.roinitial','districts.dname')
    ->join('users','district_user.user_id', '=', 'users.id')
    ->join('roles','users.role_id', '=', 'roles.id')
     ->join('districts', 'district_user.district_id', '=', 'districts.id')
      ->where('users.role_id', '=', '2')
      ->orWhere('users.role_id', '=', '5')
    ->get();
     $response = [
         'dusers' => $dusers
     ];
    return response()->json($response, 200);
   }
   public function getSUsers(){
     $susers=DB::table('school_user')->select('users.id','users.fname','users.lname','roles.roinitial','schools.name','schools.regno')
     ->join('users','school_user.user_id', '=', 'users.id')
     ->join('roles','users.role_id', '=', 'roles.id')
      ->join('schools', 'school_user.school_id', '=', 'schools.id')
     ->where('users.role_id', '=', '3')
    ->get();
     $response = [
         'susers' => $susers
     ];
    return response()->json($response, 200);
   }
   // public function getWusers(){
   //  $wusers=DB::table('users')->select('users.id','users.fname','users.lname','roles.roinitial','wards.wname')
   //  ->join('roles','users.role_id', '=', 'roles.id')
   //  ->join('user_ward', 'users.id', '=', 'user_ward.user_id')
   //  ->join('wards', 'users.id', '=', 'user_ward.user_id')
   //  ->where('role_id', '=', '4')
   //  ->get();
   //   $response = [
   //       'wusers' => $wusers
   //   ];
   //  return response()->json($response, 200);
   // }

   public function getWusers(){
     $wusers=DB::table('user_ward')->select('users.id','users.fname','users.lname','roles.roinitial','wards.wname')
      ->join('users','user_ward.user_id', '=', 'users.id')
     ->join('roles','users.role_id', '=', 'roles.id')
      ->join('wards', 'user_ward.ward_id', '=', 'wards.id')
      ->where('users.role_id', '=', '4')
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
