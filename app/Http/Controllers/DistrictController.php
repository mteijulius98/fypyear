<?php

namespace App\Http\Controllers;
use App\Region;
use App\Ward;
use App\District;
use JWTAuth;
use JWTAuthException;
use DB;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function postDistrict(Request $request){
    $district = new District();
    $district ->dname = $request->input('dname');
     $district ->postal_address = $request->input('postal_address'); 
    $district->region_id=$request->input('region_id');
    $district ->save();
    return response()->json(['district'=>$district], 201);

} 
public function getDistricts()
{
    $districts = District::select('id','dname','region_id')
    ->get();
     $response = [
         'districts' => $districts
     ];
    return response()->json($response, 200);
}
//  public function getDwards(){
//        if(! $user =JWTAuth::parseToken()->authenticate()){
// return response()->json(['message'=>'user not found'],404);
//    }
//      $dwards=DB::table('users','districts','user_ward','wards')->select('users.fname','wards.name')
//      ->where('users.id','=',auth()->user()->id)
//     ->get();
//      $response = [
//          'dwards' => $dwards
//      ];
//     return response()->json($response, 200);
//    }
// SELECT users.fname, users.mname, users.lname, wards.wname FROM users, districts, user_ward, wards WHERE wards.district_id = districts.id AND users.id = user_ward.user_id AND wards.id = user_ward.ward_id;

public function getDwards($id){
    $dwards=DB::table('user_ward')->select('users.fname','users.mname','users.lname','wards.wname','wards.district_id','wards.id')
      ->join('users','user_ward.user_id', '=', 'users.id')
      ->join('wards', 'user_ward.ward_id', '=', 'wards.id')
      ->join('districts', 'wards.district_id', '=', 'districts.id')
       ->where('district_id','=',$id)
       ->get();
     $response = [
         'dwards' => $dwards
     ];
    return response()->json($response, 200);
}
// \DB::raw('SUM(CASE
// WHEN teachers.sex="F" THEN 1 ELSE 0 END) AS FEMALES')
public function getWs($id){
    $wss=DB::table('school_user')->select('users.fname','users.mname','users.lname','schools.name','schools.regno','schools.id')
      ->join('users','school_user.user_id', '=', 'users.id')
      ->join('schools', 'school_user.school_id', '=', 'schools.id')
      ->join('wards', 'schools.ward_id', '=', 'wards.id')
       ->where('ward_id','=',$id)
       ->get();


     $response = [
         'wss' => $wss
     ];
    return response()->json($response, 200); 
}
       public function  getDteachers($id){
        $dteachers=DB::table('teachers')->select('teachers.comb AS Combination',\DB::raw('COUNT(teachers.comb) AS TOTAL')) 
   ->join('schools', 'teachers.school_id', '=', 'schools.id')
   ->join('wards', 'schools.ward_id', '=', 'wards.id')
   ->join('districts', 'wards.district_id', '=', 'districts.id')
    ->where('district_id','=',$id)
     ->groupBy('Combination')
       ->get();
     $response = [
         'dteachers' => $dteachers
     ];
    return response()->json($response, 200);  
    }
       public function  getDdis($id){
        $ddis=DB::table('students')->select('sdisabilities.name AS names',\DB::raw('COUNT(sdisabilities.name) AS TOTAL'))
   ->join('sclasses','students.sclass_id', '=', 'sclasses.id')
   ->join('sdisabilities','students.sdisability_id', '=', 'sdisabilities.id') 
   ->join('schools', 'students.school_id', '=', 'schools.id')
   ->join('wards', 'schools.ward_id', '=', 'wards.id')
    ->join('districts', 'wards.district_id', '=', 'districts.id')
    ->where('district_id','=',$id)
     ->groupBy('names')
       ->get();
     $response = [
         'ddis' => $ddis
     ];
    return response()->json($response, 200);  
    }
      public function getDinfo($id){
      $dinfos=DB::table('students')->select(\DB::raw('SUM(CASE
WHEN students.sex="M" THEN 1 ELSE 0 END) AS MALES'),\DB::raw('SUM(CASE
WHEN students.sex="F" THEN 1 ELSE 0 END) AS FEMALES'),'sclasses.name')
   ->join('sclasses','students.sclass_id', '=', 'sclasses.id') 
   ->join('schools', 'students.school_id', '=', 'schools.id')
   ->join('wards', 'schools.ward_id', '=', 'wards.id')
     ->join('districts', 'wards.district_id', '=', 'districts.id')
    ->where('district_id','=',$id)
     ->groupBy('sclasses.name')
       ->get();
     $response = [
         'dinfos' => $dinfos
     ];
    return response()->json($response, 200);
    }

}
