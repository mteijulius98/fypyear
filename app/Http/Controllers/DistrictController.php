<?php

namespace App\Http\Controllers;
use App\Region;
use App\District;
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

}
