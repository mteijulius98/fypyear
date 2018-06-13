<?php

namespace App\Http\Controllers;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function addRole(Request $request){
        $role = new Role();
        $role ->roname = $request->input('roname');
        $role ->roinitial = $request->input('roinitial');
        $role ->save();
        return response()->json(['role'=>$role], 201);
    
    } 
    public function getRoles()
{
    $roles = Role::select('id','roname','roinitial')
    ->get();
     $response = [
         'roles' => $roles
     ];
    return response()->json($response, 200);
}
}
