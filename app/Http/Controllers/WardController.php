<?php

namespace App\Http\Controllers;
use App\District;
use App\User;
use App\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function postWard(Request $request){    
        $ward = new Ward();
        $ward ->w_name = $request->input('w_name');
        $ward  ->district_name = $request->input('district_name');
        $ward  ->PO_Box = $request->input('PO_Box');
        $ward  ->user_id=User::select('id')->where('station_name','=',$request->w_name)->get();
        $ward  ->district_id=District::select('id')->where('name','=',$request->district_name)->get();
        $ward  ->save();
        return response()->json(['ward'=>$ward], 201);
     }
}
