<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\School;
use App\Ward;
class SchoolController extends Controller
{
    public function postSchool(Request $request){    
        $school = new School();
        $school ->reg_no = $request->input('reg_no');
        $school  ->s_name = $request->input('s_name');
        $school  ->ward_name = $request->input('ward_name');
        $school  ->PO_Box = $request->input('PO_Box');
        $school  ->ownership = $request->input('ownership');
        $school  ->user_id=User::select('id')->where('station_name','=',$request->s_name)->get();
        $school  ->ward_id=Ward::select('id')->where('w_name','=',$request->ward_name)->get();
        $school  ->save();
        return response()->json(['school'=>$school], 201);
     }
}
