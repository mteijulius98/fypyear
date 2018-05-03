<?php

namespace App\Http\Controllers;
use App\District;
use App\User;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function postDistrict(Request $request){
        // if(! $user = JWTAuth::parseToken()->authenticate()){
          //   return response()->json(['message' => 'User not found'],404);
        //}
       
        if(!empty(User::select('id')->where('station_name','=',$request->name)->get()->first()->id)){
$district = new District();
        $district ->name = $request->input('name');
        $district ->region = $request->input('region');
        $district ->PO_Box = $request->input('PO_Box');
        $district ->user_id=User::select('id')->where('station_name','=',$request->name)->get()->first()->id;
        $district ->save();
        return response()->json(['district'=>$district], 201);
        }
        
     }
     public function getDistricts()
     {
      $districts = District::all();
       $response = [
           'districts' => $districts
       ];
      return response()->json($response, 200);
     }
    
}
