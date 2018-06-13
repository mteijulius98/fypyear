<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scategory;
use App\Sownership;
use App\Sdisability;
use App\School;
use App\Sclass;
use App\Icategory;
use App\Tlmcategory;
use App\Eqcategory;
use App\Equipment;
use App\Infrastructure;
use App\Tlmaterial;
use App\Service;
use DB;
class SchoolController extends Controller
   {
    public function addOwnership(Request $request){
        $sownership = new Sownership();
        $sownership ->name = $request->input('name');
        $sownership ->save();
        return response()->json(['sownership'=>$sownership], 201);

    }
    public function addCategory(Request $request){
        $scategory = new Scategory();
        $scategory ->name = $request->input('name');
        $scategory ->save();
        return response()->json(['scategory'=>$scategory], 201);

    }
    public function addDisability(Request $request){
        $sdisability = new Sdisability();
        $sdisability ->name = $request->input('name');
        $sdisability ->save();
        return response()->json(['sdisability'=>$sdisability], 201);

    }
    public function addClass(Request $request){
        $sclass = new Sclass();
        $sclass ->name = $request->input('name');
        $sclass ->save();
        return response()->json(['sclass'=>$sclass], 201);

    }
    public function addIncategory(Request $request){
        $icategory = new Icategory();
        $icategory ->name = $request->input('name');
        $icategory ->save();
        return response()->json(['icategory'=>$icategory], 201);

    }
    public function addTlmcategory(Request $request){
        $tlmcategory = new Tlmcategory();
        $tlmcategory ->name = $request->input('name');
        $tlmcategory ->save();
        return response()->json(['tlmcategory'=>$tlmcategory], 201);

    }
    public function addEqcategory(Request $request){
        $eqcategory = new Eqcategory();
        $eqcategory ->name = $request->input('name');
        $eqcategory ->save();
        return response()->json(['eqcategory'=>$eqcategory], 201);

    }
public function addInfrastructure(Request $request){
        $infrastructure = new Infrastructure();
        $infrastructure ->name = $request->input('name');
        $infrastructure ->available = $request->input('available');
        $infrastructure ->needed = $request->input('needed');
        $infrastructure ->icategory_id = $request->input('icategory_id');
        $infrastructure ->save();
        return response()->json(['infrastructure'=>$infrastructure], 201);

    }
public function addTlmaterial(Request $request){
        $tlmaterial = new Tlmaterial();
        $tlmaterial ->name = $request->input('name');
        $tlmaterial ->tlmcategory_id = $request->input('tlmcategory_id');
        $tlmaterial ->sclass_id = $request->input('sclass_id');
        $tlmaterial ->available = $request->input('available');
        $tlmaterial ->save();
        return response()->json(['tlmaterial'=>$tlmaterial], 201);

    }
    public function addEquipment(Request $request){
        $equipment = new Equipment();
        $equipment ->name = $request->input('name');
        $equipment ->eqcategory_id = $request->input('eqcategory_id');
        $equipment ->sclass_id = $request->input('sclass_id');
        $equipment ->available = $request->input('available');
        $equipment ->save();
        return response()->json(['equipment'=>$equipment], 201);

    }
    public function addService(Request $request){
        $service = new Service();
        $service ->name = $request->input('name');
        $service ->availability = $request->input('availability');
        $service ->save();
        return response()->json(['service'=>$service], 201);

    }
    public function addSchool(Request $request){
        $school = new School();
        $school ->name = $request->input('name');
        $school ->regno = $request->input('regno');
        $school ->regdate = $request->input('regdate');
        $school ->postal_address = $request->input('postal_address');
        $school ->email = $request->input('email');
        $school ->phone_number = $request->input('phone_number');
        $school ->ward_id = $request->input('ward_id');
        $school ->sownership_id = $request->input('sownership_id');
        $school ->scategory_id = $request->input('scategory_id');
        $school ->save();
        return response()->json(['school'=>$school], 201);

    }
     public function getSchools(){
    $schools=DB::table('schools')->select('name','regno','wards.wname')
    ->join('wards','schools.ward_id', '=', 'wards.id')
    ->get();
     $response = [
         'schools' => $schools
     ];
    return response()->json($response, 200);
   }
 public function getCategory(){
    $categories = Scategory::select('id','name')
    ->get();
     $response = [
         'categories' => $categories
     ];
    return response()->json($response, 200);
}
public function getOwnership(){
    $ownerships = Sownership::select('id','name')
    ->get();
     $response = [
         'ownerships' => $ownerships
     ];
    return response()->json($response, 200);
}
}
