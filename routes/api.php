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
Route::post('/incategory',[
        'uses' => 'SchoolController@addIncategory'
      ]);
Route::post('/tlmcategory',[
        'uses' => 'SchoolController@addTlmcategory'
      ]);
Route::post('/tlmaterial',[
        'uses' => 'SchoolController@addTlmaterial'
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
      Route::post('/infrastructure',[
        'uses' => 'SchoolController@addInfrastructure'
      ]);

Route::get('/sdetails',[
        'uses' => 'SdetailController@getSdetails'
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