<?php

namespace App\Http\Controllers;
use App\Ward;
use App\District;
use JWTAuth;
use JWTAuthException;
use DB;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function postWard(Request $request){    
        $ward = new Ward();
        $ward ->wname = $request->input('wname');
        $ward ->district_id = $request->input('district_id');
         $ward ->postal_address = $request->input('postal_address');
        $ward  ->save();
        return response()->json(['ward'=>$ward], 201);
     }

     public function getWards(){
    $wards = Ward::select('id','wname','district_id')
    ->get();
     $response = [
         'wards' => $wards
     ];
    return response()->json($response, 200);
}
 public function getWschools(){
       if(! $user =JWTAuth::parseToken()->authenticate()){
return response()->json(['message'=>'user not found'],404);
   }
     $swards=DB::table('user_ward')->select('schools.id','schools.name','schools.regno')
     ->join('users','user_ward.user_id', '=', 'users.id')
     ->join('wards','user_ward.ward_id', '=', 'wards.id')
      ->join('schools', 'schools.ward_id', '=', 'wards.id')
     ->where('users.id','=',auth()->user()->id)
    ->get();
     $response = [
         'swards' => $swards
     ];
    return response()->json($response, 200);
   }
}
