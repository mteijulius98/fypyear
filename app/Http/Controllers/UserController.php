<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
   public function signup(Request $request){
       $this->validate($request,[
          'firstname'=>'required',
           'lastname'=>'required',
           'email'=> 'required|email|unique:users',
           'password'=>'required',
           'station_name'=>'required',
           'role' =>'required'

       ]);
       $user = new User([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'station_name' => $request->input('station_name'),
        'role' => $request->input('role')
    ]);
    $user->save();
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

   $user_roles=User::select('role')->where('email','=',$request->email)->get();
   //$user_roles=User::select('role')->where([['email','=',$request->email],['password','=',$request->password],])->get();



               $role1='';
              foreach($user_roles as $role){
                 
                  $role1=$role->role;

              }

    return response()->json(['token'=> $token,'role'=>$role1],200);

       
        
        
}
}
