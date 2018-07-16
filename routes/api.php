<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/district',[
    'uses' => 'DistrictController@postDistrict'

    ]);
Route::get('/dtechs/{id}',[
    'uses' => 'DistrictController@getDteachers'

    ]);
Route::get('/total/{id}',[
    'uses' => 'SchoolController@totalStudents'

    ]);
Route::get('/ddis/{id}',[
    'uses' => 'DistrictController@getDdis'

    ]);
Route::get('/dinfos/{id}',[
    'uses' => 'DistrictController@getDinfo'

    ]);
Route::get('/spesch/{id}',[
    'uses' => 'SchoolController@getSpeSchool'

    ]);
  

Route::get('/bUpdate/{id}',[
    'uses' => 'SchoolController@bUpdate'

    ]);
Route::get('/techs/{id}',[
    'uses' => 'SchoolController@getTech'

    ]);
Route::get('/wardis/{id}',[
    'uses' => 'SchoolController@getWdis'

    ]);
Route::get('/wardteach/{id}',[
    'uses' => 'SchoolController@getWteachers'

    ]);
Route::get('/infas/{id}',[
    'uses' => 'SchoolController@getInfa'

    ]);
Route::get('/infos/{id}',[
    'uses' => 'SchoolController@getWinfo'

    ]);
Route::get('/dUpdate/{id}',[
    'uses' => 'SchoolController@dUpdate'

    ]);
Route::get('/swards',[
    'uses' => 'WardController@getWschools'

    ]);
Route::get('/ws/{id}',[
    'uses' => 'DistrictController@getWs'
    ]);
Route::get('/dwards/{id}',[
    'uses' => 'DistrictController@getDwards'

    ]);
Route::get('/sorphans/{id}',[
    'uses' => 'SchoolController@getOrphan'

    ]);
Route::get('/sdrops',[
    'uses' => 'SchoolController@getSdrops'

    ]);
Route::get('/sdisables/{id}',[
    'uses' => 'SchoolController@getDstudents'

    ]);
Route::get('/sdatas/{id}',[
    'uses' => 'SchoolController@getSdata'

    ]);
Route::delete('/role/{id}',[
    'uses' => 'RoleController@deleteRole'

    ]);
Route::delete('/user/{id}',[
    'uses' => 'UserController@deleteUser'
    ]);
Route::put('/user/{id}',[
    'uses' => 'UserController@putUser'
    ]);
Route::put('/role/{id}',[
    'uses' => 'RoleController@putRole'
    ]);
Route::post('/school',[
  'uses' => 'SchoolController@addSchool'
    
        ]);
Route::put('/school/{id}',[
  'uses' => 'SchoolController@putSchool'
    
        ]);
Route::get('/schools',[
        'uses' => 'SchoolController@getSchools'
    
        ]);
Route::get('/categories',[
        'uses' => 'SchoolController@getCategory'
    
        ]);
Route::get('/ownerships',[
        'uses' => 'SchoolController@getOwnership'
    
        ]);
Route::post('/region',[
        'uses' => 'RegionController@postRegion'
    
        ]);
Route::get('/regions',[
        'uses' => 'RegionController@getRegion'
    
        ]);
Route::get('/districts',[
    'uses' => 'DistrictController@getDistricts'
    ]);
Route::post('/users',[
        'uses' => 'UserController@signup'
    ]);
Route::post('/users/signin',[
        'uses' => 'UserController@signin'
    ]);
Route::post('/category',[
        'uses' => 'SchoolController@addCategory'
    ]);
Route::post('/ward',[
        'uses' => 'WardController@postWard'
    ]);
Route::get('/wards',[
        'uses' => 'WardController@gerWards'
    ]);

Route::get('/users',[
      'uses' => 'UserController@getUsers'
    ]);
Route::get('/dusers',[
      'uses' => 'UserController@getDusers'
    ]);
Route::get('/susers',[
      'uses' => 'UserController@getSusers'
    ]);
Route::get('/wusers',[
      'uses' => 'UserController@getWusers'
    ]);
Route::post('/ownership',[
        'uses' => 'SchoolController@addOwnership'
      ]);
 Route::post('/disability',[
        'uses' => 'SchoolController@addDisability'
      ]);
 Route::get('/disabilities',[
        'uses' => 'SchoolController@getDisabilities'
      ]);
Route::post('/reason',[
        'uses' => 'SchoolController@addDreason'
      ]);
Route::post('/subject',[
        'uses' => 'SchoolController@addSubject'
      ]);

Route::post('/class',[
        'uses' => 'SchoolController@addClass'
      ]);
Route::get('/equipments',[
        'uses' => 'SchoolController@getEquipments'
      ]);

Route::get('/classes',[
        'uses' => 'SchoolController@getClasses'
      ]);
Route::post('/incategory',[
        'uses' => 'SchoolController@addIncategory'
      ]);
Route::post('/tlmcategory',[
        'uses' => 'SchoolController@addTlmcategory'
      ]);
Route::get('/tlmcategories',[
        'uses' => 'SchoolController@getTlcategory'
      ]);
Route::post('/tlmaterial',[
        'uses' => 'SchoolController@addTlmaterial'
      ]);
Route::post('/expenditure',[
        'uses' => 'SchoolController@addExpenditure'
      ]);
Route::get('/tlmaterials',[
        'uses' => 'SchoolController@getTlm'
      ]);
Route::post('/equipment',[
        'uses' => 'SchoolController@addEquipment'
      ]);
Route::post('/service',[
        'uses' => 'SchoolController@addService'
      ]);
Route::post('/student',[
        'uses' => 'SchoolController@addStudent'
      ]);
Route::get('/students',[
        'uses' => 'SchoolController@getStudents'
      ]);
Route::get('/attendances',[
        'uses' => 'SchoolController@getSattendances'
      ]);
Route::post('/attendance',[
        'uses' => 'SchoolController@addSattendance'
      ]);
Route::post('/eqcategory',[
        'uses' => 'SchoolController@addEqcategory'
      ]);
Route::get('/eqcategories',[
        'uses' => 'SchoolController@getEqcategory'
      ]);
Route::post('/infrastructure',[
        'uses' => 'SchoolController@addInfrastructure'
      ]);
Route::get('/icategories',[
        'uses' => 'SchoolController@getIcategory'
      ]);
Route::get('/revenues',[
        'uses' => 'SchoolController@getRevenues'
      ]);
Route::get('/expenditures',[
        'uses' => 'SchoolController@getExpenditures'
      ]);
Route::get('/infrastructures',[
        'uses' => 'SchoolController@getInfrastructure'
      ]);
Route::post('/revenue',[
        'uses' => 'SchoolController@addRevenue'
      ]);
Route::post('/ntstaff',[
        'uses' => 'SchoolController@addNtstaff'
      ]);
Route::post('/teacher',[
        'uses' => 'SchoolController@addTeacher'
      ]);
Route::get('/teachers',[
        'uses' => 'SchoolController@getTeachers'
    ]);

Route::get('/ntstaffs',[
        'uses' => 'SchoolController@getNtstaffs'
      ]);
Route::get('/wards',[
        'uses' => 'WardController@getWards'
        //'middleware' =>'auth.jwt'
      ]);
Route::post('/role',[
        'uses' => 'RoleController@addRole'
      ]);
Route::get('/roles',[
        'uses' => 'RoleController@getRoles'
      ]);