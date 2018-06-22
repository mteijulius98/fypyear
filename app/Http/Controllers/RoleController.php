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
     ->where('id','=','2')
    ->orWhere('id','=','3')
    ->orWhere('id','=','4')
    ->orWhere('id','=','5')
    ->get();
     $response = [
         'roles' => $roles
     ];
    return response()->json($response, 200);
}
 public function deleteRole($id)
    {
        $role = Role::find($id);
        $role ->delete();
        return response()->json(['message'=> 'Role deleted'], 200);
    }
      public function putRole(Request $request, $id){
        $role = Role::find($id);
        if(!$role){
            return response()->json(['message'=> 'Document not found'], 404);
        }
        $role ->roname = $request->input('roname');
        $role ->roinitial = $request->input('roinitial');
        $role ->save();
        return response()->json(['role'=>$role], 200);
    }
}
