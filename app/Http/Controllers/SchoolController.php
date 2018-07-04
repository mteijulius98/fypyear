<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use App\Scategory;
use App\Sownership;
use App\Sdisability;
use App\School;
use App\Sattendance;
use App\Sclass;
use App\Student;
use App\Subject;
use App\Icategory;
use App\Tlmcategory;
use App\Eqcategory;
use App\Equipment;
use App\Infrastructure;
use App\Tlmaterial;
use App\Service;
use App\User;
use App\Revenue;
use App\Ntstaff;
use App\Teacher;
use App\Dreason;
use App\Expenditure;
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
    public function addDreason(Request $request){
        $dreason = new Dreason();
        $dreason ->reason = $request->input('reason');
        $dreason ->save();
        return response()->json(['dreason'=>$dreason], 201);
    }
    public function addSubject(Request $request){
        $subject = new Subject();
        $subject ->name= $request->input('name');
        $subject ->save();
        return response()->json(['subject'=>$subject], 201);
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
      if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
      }
        $i = new Infrastructure();
        $i ->name = $request->input('name');
        $i ->available = $request->input('available');
        $i ->needed = $request->input('needed');
        $i ->icategory_id = $request->input('icategory_id');
        $i ->user_id=auth()->user()->id;
        $i ->school_id=School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id;
        $i ->save();
        $infrastructure=Infrastructure::find($i->id);
        $infrastructure->schools()->attach(School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id); 
        return response()->json(['i'=>$i], 201);

    }
public function addTlmaterial(Request $request){
  if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
      }
        $tlmaterial = new Tlmaterial();
        $tlmaterial ->name = $request->input('name');
        $tlmaterial ->tlmcategory_id = $request->input('tlmcategory_id');
        $tlmaterial ->sclass_id = $request->input('sclass_id');
        $tlmaterial ->available = $request->input('available');
        $tlmaterial ->needed = $request->input('needed');
        $tlmaterial ->user_id=auth()->user()->id;
        $tlmaterial ->school_id=School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id;
        $tlmaterial ->save();
        return response()->json(['tlmaterial'=>$tlmaterial], 201);

    }
    public function addEquipment(Request $request){
         if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
        $equipment = new Equipment();
        $equipment ->name = $request->input('name');
        $equipment ->eqcategory_id = $request->input('eqcategory_id');
        $equipment ->sclass_id = $request->input('sclass_id');
        $equipment ->available = $request->input('available');
        $equipment ->needed = $request->input('needed');
        $equipment ->user_id=auth()->user()->id;
        $equipment ->school_id=School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id;
        $equipment ->save();
        return response()->json(['equipment'=>$equipment], 201);

    }
    public function addService(Request $request){
         if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
        $s = new Service();
        $s ->name = $request->input('name');
        $s ->availability = $request->input('availability');
        $s ->user_id=auth()->user()->id;
        $s ->school_id=School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id;
        $s ->save();
        $service=Service::find($s->id);
        $service->schools()->attach(School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id); 
        return response()->json(['s'=>$s], 201);
        }

         public function addRevenue(Request $request){
             if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
        $revenue = new Revenue();
        $revenue ->source = $request->input('source');
        $revenue ->amount = $request->input('amount');
        $revenue ->kuanzia = $request->input('kuanzia');
        $revenue ->mpaka = $request->input('mpaka');
        $revenue ->user_id=auth()->user()->id;
        $revenue ->school_id=School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id;
        $revenue ->save();
        return response()->json(['revenue'=>$revenue], 201);
    }
      public function addExpenditure(Request $request){
             if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
        $expenditure = new Expenditure();
        $expenditure ->name = $request->input('name');
        $expenditure ->amount = $request->input('amount');
        $expenditure ->kuanzia = $request->input('kuanzia');
        $expenditure ->mpaka = $request->input('mpaka');
        $expenditure ->revenue_id = $request->input('revenue_id');
        $expenditure ->user_id=auth()->user()->id;
        $expenditure ->school_id=School::select('schools.id')
        ->join('school_user','schools.id', '=', 'school_user.school_id')
        ->where('user_id','=',auth()->user()->id)->get()->first()->id;
        $expenditure ->save();
        return response()->json(['expenditure'=>$expenditure], 201);
    }
    public function addNtstaff(Request $request){
        if(! $user =JWTAuth::parseToken()->authenticate()){
   return response()->json(['message'=>'user not found'],404);
       }
   $ntstaff = new NtStaff();
   $ntstaff ->designation = $request->input('designation');
   $ntstaff ->count = $request->input('count');
   $ntstaff ->user_id=auth()->user()->id;
   $ntstaff ->school_id=School::select('schools.id')
   ->join('school_user','schools.id', '=', 'school_user.school_id')
   ->where('user_id','=',auth()->user()->id)->get()->first()->id;
   $ntstaff ->save();
   return response()->json(['ntstaff'=>$ntstaff], 201);
}
public function addTeacher(Request $request){
    if(! $user =JWTAuth::parseToken()->authenticate()){
return response()->json(['message'=>'user not found'],404);
   }
$teacher = new Teacher();
$teacher ->fname = $request->input('fname');
$teacher ->mname = $request->input('mname');
$teacher ->lname = $request->input('lname');
$teacher ->sex = $request->input('sex');
$teacher ->birth = $request->input('birth');
$teacher ->edlevel = $request->input('edlevel');
$teacher ->epdate = $request->input('epdate');
$teacher ->epid = $request->input('epid');
$teacher ->user_id=auth()->user()->id;
$teacher ->school_id=School::select('schools.id')
->join('school_user','schools.id', '=', 'school_user.school_id')
->where('user_id','=',auth()->user()->id)->get()->first()->id;
$teacher ->save();
return response()->json(['teacher'=>$teacher], 201);
}
public function addStudent(Request $request){
    if(! $user =JWTAuth::parseToken()->authenticate()){
return response()->json(['message'=>'user not found'],404);
   }
$student = new Student();
$student ->fname = $request->input('fname');
$student ->mname = $request->input('mname');
$student ->lname = $request->input('lname');
$student ->sex = $request->input('sex');
$student ->bdate = $request->input('bdate');
$student ->anumber = $request->input('anumber');
$student ->sclass_id = $request->input('sclass_id');
$student ->status = $request->input('status');
$student ->lstatus = $request->input('lstatus');
$student ->orphan = $request->input('orphan');
$student ->sdisability_id = $request->input('sdisability_id');
$student ->nationality = $request->input('nationality');
// $student ->year = $request->input('year');
$student ->user_id=auth()->user()->id;
$student ->school_id=School::select('schools.id')
->join('school_user','schools.id', '=', 'school_user.school_id')
->where('user_id','=',auth()->user()->id)->get()->first()->id;
$student ->save();
return response()->json(['student'=>$student], 201);
}
public function addSattendance(Request $request){
    if(! $user =JWTAuth::parseToken()->authenticate()){
return response()->json(['message'=>'user not found'],404);
   }
$sattendance = new Sattendance();
$sattendance ->avmale = $request->input('avmale');
$sattendance ->avfemale = $request->input('avfemale');
$sattendance ->start_from = $request->input('start_from');
$sattendance ->end_to = $request->input('end_to');
$sattendance ->sclass_id = $request->input('sclass_id');
$sattendance ->user_id=auth()->user()->id;
$sattendance ->school_id=School::select('schools.id')
->join('school_user','schools.id', '=', 'school_user.school_id')
->where('user_id','=',auth()->user()->id)->get()->first()->id;
$sattendance ->save();
return response()->json(['sattendance'=>$sattendance], 201);
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

    //  public function getSdata(){
    //  $students=DB::table('students')->select(\DB::raw('TIMESTAMPDIFF(YEAR,students.bdate,CURDATE()) as age'),\DB::raw('count(*)  as female' ),'sclasses.name',\DB::raw('count(*)  as male' ))
    //   // $students=DB::table('students')->count('*');
    // ->join('sclasses','students.sclass_id', '=', 'sclasses.id')
    // ->where('students.sex', '=', 'F')
    // ->orWhere('students.sex', '=', 'M')
    // ->groupBy('age','sclasses.name','students.sex')
    // ->get();
    //  $response = [
    //      'students' => $students
    //  ];
    // return response()->json($response, 200);
    // }

   public function getSdata(){
     $students=DB::table('students')->select(\DB::raw('TIMESTAMPDIFF(YEAR,students.bdate,CURDATE()) as age'),\DB::raw('SUM(CASE
WHEN students.sex="M" THEN 1 ELSE 0 END) AS MALES'),\DB::raw('SUM(CASE
WHEN students.sex="F" THEN 1 ELSE 0 END) AS FEMALES'),'sclasses.name')
      // $students=DB::table('students')->count('*');
    ->join('sclasses','students.sclass_id', '=', 'sclasses.id')
    ->groupBy('age','sclasses.name')
    ->get();
     $response = [
         'students' => $students
     ];
    return response()->json($response, 200);
    }

      public function getOrphan(){
     $ostudents=DB::table('students')->select(\DB::raw('SUM(CASE
WHEN students.sex="M" THEN 1 ELSE 0 END) AS MALES'),\DB::raw('SUM(CASE
WHEN students.sex="F" THEN 1 ELSE 0 END) AS FEMALES'),'students.orphan','sclasses.name')
      // $students=DB::table('students')->count('*');
    ->join('sclasses','students.sclass_id', '=', 'sclasses.id')
    ->groupBy('sclasses.name','students.orphan')
    ->get();
     $response = [
         'ostudents' => $ostudents
     ];
    return response()->json($response, 200);
    }
//       public function getSdrops(){
//      $ostudents=DB::table('students')->select(\DB::raw('SUM(CASE
// WHEN students.sex="M" THEN 1 ELSE 0 END) AS MALES'),\DB::raw('SUM(CASE
// WHEN students.sex="F" THEN 1 ELSE 0 END) AS FEMALES'),\DB::raw('SUM(CASE
// WHEN dreasons.name="Mimba" THEN 1 ELSE 0 END) AS Mimba'),\DB::raw('SUM(CASE
// WHEN dreasons.name="Utoro" THEN 1 ELSE 0 END) AS Utoro'),\DB::raw('SUM(CASE
// WHEN dreasons.name="Utovu_wa_Nidhamu" THEN 1 ELSE 0 END) AS Utovu_wa_Nidhamu'),\DB::raw('SUM(CASE
// WHEN dreasons.name="Kifo" THEN 1 ELSE 0 END) AS Kifo'),'sclasses.name')
//       // $students=DB::table('students')->count('*');
//     ->join('sclasses','students.sclass_id', '=', 'sclasses.id')
//      ->join('dreasons','students.dreason_id', '=', 'dreasons.id')
//     ->groupBy('sclasses.name')
//     ->get();
//      $response = [
//          'ostudents' => $ostudents
//      ];
//     return response()->json($response, 200);
//     }
    

          public function getDstudents($id){
             //$school = School::find($id);
     $dstudents=DB::table('students')->select(\DB::raw('SUM(CASE
WHEN students.sex="M" THEN 1 ELSE 0 END) AS MALES'),\DB::raw('SUM(CASE
WHEN students.sex="F" THEN 1 ELSE 0 END) AS FEMALES'),'sdisabilities.name AS names','sclasses.name','school_id')
     ->where('school_id','=',$id)
      // $students=DB::table('students')->count('*');
    ->join('sclasses','students.sclass_id', '=', 'sclasses.id')
     ->join('sdisabilities','students.sdisability_id', '=', 'sdisabilities.id')
    ->groupBy('names','sclasses.name','school_id')

    ->get();
     $response = [
         'dstudents' => $dstudents
     ];
    return response()->json($response, 200);
    }
//           public function getDstudents(){
//              if(! $user =JWTAuth::parseToken()->authenticate()){
// return response()->json(['message'=>'user not found'],404);
//    }
//              //$school = School::find($id);
//      $dstudents=DB::table('students')->select(\DB::raw('SUM(CASE
// WHEN students.sex="M" THEN 1 ELSE 0 END) AS MALES'),\DB::raw('SUM(CASE
// WHEN students.sex="F" THEN 1 ELSE 0 END) AS FEMALES'),'sdisabilities.name AS names','sclasses.name','school_id')
//       ->where('school_id','=',auth()->user()->school_id)
//       // $students=DB::table('students')->count('*');
//     ->join('sclasses','students.sclass_id', '=', 'sclasses.id')
//      ->join('sdisabilities','students.sdisability_id', '=', 'sdisabilities.id')
//     ->groupBy('names','sclasses.name','school_id')
    
//     ->get();
//      $response = [
//          'dstudents' => $dstudents
//      ];
//     return response()->json($response, 200);
//     }


    public function getDisabilities(){
    $sdisabilities = Sdisability::select('id','name')
    ->get();
     $response = [
         'sdisabilities' => $sdisabilities
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
public function getRevenues(){
  if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
    $revenues = Revenue::select('source','amount')
     ->where('user_id','=',auth()->user()->id)
    ->get();
     $response = [
         'revenues' => $revenues
     ];
    return response()->json($response, 200);
}
public function getExpenditures(){
  if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
    $expenditures = Expenditure::select('name','amount')
     ->where('user_id','=',auth()->user()->id)
    ->get();
     $response = [
         'expenditures' => $expenditures
     ];
    return response()->json($response, 200);
}

public function getIcategory(){
    $icategories = Icategory::select('id','name')
    ->get();
     $response = [
         'icategories' => $icategories
     ];
    return response()->json($response, 200);
}
public function getTlcategory(){
    $tlmcategories = Tlmcategory::select('id','name')
    ->get();
     $response = [
         'tlmcategories' => $tlmcategories
     ];
    return response()->json($response, 200);
}
public function getClasses(){
    $sclasses = Sclass::select('id','name')
    ->get();
     $response = [
         'sclasses' => $sclasses
     ];
    return response()->json($response, 200);
}
public function getEqcategory(){
    $eqcategories = Eqcategory::select('id','name')
    ->get();
     $response = [
         'eqcategories' => $eqcategories
     ];
    return response()->json($response, 200);
}
public function getTeachers(){
   if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
    $teachers = Teacher::select('fname','lname')
     ->where('user_id','=',auth()->user()->id)
    ->get();
     $response = [
         'teachers' => $teachers
     ];
    return response()->json($response, 200);
}
public function getStudents(){
      if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
    $students = Student::select('fname','lname')
    ->where('user_id','=',auth()->user()->id)
    ->get();
     $response = [
         'students' => $students
     ];
    return response()->json($response, 200);
}
public function getSattendances(){
   if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
      }
    $sattendances=DB::table('sattendances')->select('avmale','avfemale','start_from','end_to','sclasses.name')
 ->join('sclasses','sattendances.sclass_id', '=', 'sclasses.id')
  ->where('user_id','=',auth()->user()->id)
    ->get();
     $response = [
         'sattendances' => $sattendances
     ];
    return response()->json($response, 200);
}
public function getNtstaffs(){
  if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
      }
    $ntstaffs = Ntstaff::select('designation','count')
     ->where('user_id','=',auth()->user()->id)
    ->get();
     $response = [
         'ntstaffs' => $ntstaffs
     ];
    return response()->json($response, 200);
}
public function getInfrastructure(){
     if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
   // if(auth()->user()->id == Infrastructure::select('user_id')
   //  ->get()){

    $infrastructures =Infrastructure::select('infrastructures.name AS Name','icategories.name AS category','available','needed')

    ->join('icategories','infrastructures.icategory_id', '=', 'icategories.id')
     ->where('user_id','=',auth()->user()->id)
    ->get();

     $response = [
         'infrastructures' => $infrastructures
     ];
    return response()->json($response, 200);
   // }  
}
public function getTlm(){
  if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
    $tlmaterials =Tlmaterial::select('tlmaterials.name AS Name','tlmcategories.name AS category','available','needed','sclasses.name AS ClassName')
    ->join('tlmcategories','tlmaterials.tlmcategory_id', '=', 'tlmcategories.id')
     ->join('sclasses','tlmaterials.sclass_id', '=', 'sclasses.id')
       ->where('user_id','=',auth()->user()->id)
       ->get();

     $response = [
         'tlmaterials' => $tlmaterials
     ];
    return response()->json($response, 200);
   // }  
}
public function getEquipments(){
  if(! $user =JWTAuth::parseToken()->authenticate()){
        return response()->json(['message'=>'user not found'],404);
            }
    $equipments =Equipment::select('equipment.name AS Name','eqcategories.name AS category','available','needed')
    ->join('eqcategories','equipment.eqcategory_id', '=', 'eqcategories.id')
    ->where('user_id','=',auth()->user()->id)
    ->get();

     $response = [
         'equipments' => $equipments
     ];
    return response()->json($response, 200);
  
}



}
