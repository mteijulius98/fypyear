<?php

namespace App\Http\Controllers;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function postRegion(Request $request){
        $region = new Region();
        $region ->rname = $request->input('rname');
        $region ->save();
        return response()->json(['region'=>$region], 201);

    }
    public function getRegion(){
    $regions = Region::select('id','rname')
    // ->where('role_id','=','1')
    ->get();
     $response = [
         'regions' => $regions
     ];
    return response()->json($response, 200);
   }
}
