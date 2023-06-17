<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserRole;

class UserRoleController extends Controller
{
    function index(){
        $userRoleDetails = UserRole::all()->sortBy("sys_user_role_id");
        return view('user_roles.userRole', compact('userRoleDetails'));
    }

    function addNewuserRoleIndex(){
        return view('user_roles.addUserRole');
    }

    function saveNewUserRole(Request $request){
        $Role = $request -> Role;

        if(!$Role){
            return response()->json(['data' => 0,'message' => "User Role cannot be empty"], 200);
        }

        try
        {
            $userRole = new UserRole;
            $data['sys_user_role'] = $Role;
            $data['created_time'] = date('Y-m-d');
            $data['is_active'] = "1";
            $data['is_deleted'] = "0";

            $userRole->create($data);

            return response()->json(['data' => 1], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function view($id)
    {
        try
        {
            $userRole = UserRole::findOrFail($id);
            return view('user_roles.viewUserRole', compact('userRole'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $userRole = UserRole::findOrFail($id);
            return view('user_roles.editUserRole', compact('userRole'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        if(!$request->RoleName){
            return response()->json(['data' => 0,'message' => "User Role cannot be empty"], 200);
        }

        try
        {
            $userRole = UserRole::findOrFail($request->RoleID);
            $userRole->sys_user_role = $request->RoleName;
            
            $userRole->update();

            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try
        {
            UserRole::destroy($request->userID);
            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
