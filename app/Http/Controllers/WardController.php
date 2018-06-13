<?php

namespace App\Http\Controllers;
use App\Ward;
use App\District;
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
}
