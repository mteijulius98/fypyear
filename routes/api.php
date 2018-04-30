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
Route::get('/districts',[
    'uses' => 'DistrictController@getDistricts'
    ]);
Route::post('/users',[
        'uses' => 'UserController@signup'
    ]);
Route::post('/users/signin',[
        'uses' => 'UserController@signin'
    ]);
Route::post('/ward',[
        'uses' => 'WardController@postWard'
    ]);
Route::post('/school',[
        'uses' => 'SchoolController@postSchool'
    ]);