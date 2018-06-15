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
Route::post('/school',[
        'uses' => 'SchoolController@addSchool'
    
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
Route::post('/class',[
        'uses' => 'SchoolController@addClass'
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
Route::get('/tlmaterials',[
        'uses' => 'SchoolController@getTlm'
      ]);
      Route::post('/equipment',[
        'uses' => 'SchoolController@addEquipment'
      ]);
      Route::post('/service',[
        'uses' => 'SchoolController@addService'
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