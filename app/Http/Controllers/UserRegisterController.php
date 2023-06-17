<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserRole;
use App\Models\UserDream;

class UserRegisterController extends Controller
{
    function index(){
        $userDetails = User::all()->sortBy("user_id");
        return view('users.user', compact('userDetails'));
    }

    function addNewUserIndex(){
        $UserRole = UserRole::all()->sortBy("user_id");
        return view('users.addUser', compact('UserRole'));
    }

    function saveNewUser(Request $request){
        $UserEmail = $request -> UserEmail;
        $Username = $request -> Username;
        $Fname = $request -> Fname;
        $Lname = $request -> Lname;
        $Age = $request -> Age;
        $Country = $request -> Country;
        $Password = $request -> Password;
        $time_zone = $request -> time_zone;
        $RoleType = $request -> RoleType;

        if(!$UserEmail){
            return response()->json(['data' => 0,'message' => "Email cannot be empty"], 200);
        }
        if(strpos( $UserEmail, "@" ) != true || strpos( $UserEmail, "." ) != true){
            return response()->json(['data' => 0,'message' => "Email must include @ and . signs"], 200);
        }
        if(!$Password){
            return response()->json(['data' => 0,'message' => "Password cannot be empty"], 200);
        }
        if(strlen($Password) < 4){
            return response()->json(['data' => 0,'message' => "Password must have at least 4 characters"], 200);
        }
        if(strlen($Password) > 20){
            return response()->json(['data' => 0,'message' => "Password maximum character length is 20"], 200);
        }
        try
        {
            $user = new User;
            $data['email'] = $UserEmail;
            $data['username'] = $Username;
            $data['first_name'] = $Fname;
            $data['last_name'] = $Lname;
            $data['age'] = $Age;
            $data['country'] = $Country;
            $data['timezone'] = $time_zone;
            $data['sys_user_role_id'] = $RoleType;
            $data['created_time'] = date('Y-m-d');;
            $data['is_active'] = "1";
            $data['is_deleted'] = "0";
            //$data['password'] = md5($Password);
            $data['password'] = $Password;
            
            $user->create($data);

            return response()->json(['data' => 1], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function view($id)
    {
        try
        {
            $user = User::findOrFail($id);

            $goodCount = UserDream::where("user_id", "=", $id)->where("sys_dream_mood_id", "=", 2)->count();
            $normalCount = UserDream::where("user_id", "=", $id)->where("sys_dream_mood_id", "=", 3)->count();
            $badCount = UserDream::where("user_id", "=", $id)->where("sys_dream_mood_id", "=", 4)->count();

            $UserRole = UserRole::all()->sortBy("user_id");

            $dreamPostLastDays= UserDream::where("user_id", "=", $id)->orderBy("user_dream_id")->limit(3)->get();

            return view('users.viewUser', compact('user',
                                                'goodCount',
                                                'normalCount',
                                                'badCount',
                                                'UserRole',
                                            'dreamPostLastDays'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $UserRole = UserRole::all()->sortBy("user_id");
            return view('users.editUser', compact('user','UserRole'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        if(!$request->UserEmail){
            return response()->json(['data' => 0,'message' => "Email cannot be empty"], 200);
        }
        if(strpos( $request->UserEmail, "@" ) != true || strpos( $request->UserEmail, "." ) != true){
            return response()->json(['data' => 0,'message' => "Email must include @ and . signs"], 200);
        }
        if(!$request->Password){
            return response()->json(['data' => 0,'message' => "Password cannot be empty"], 200);
        }
        if(strlen($request->Password) < 4){
            return response()->json(['data' => 0,'message' => "Password must have at least 4 characters"], 200);
        }
        if(strlen($request->Password) > 20){
            return response()->json(['data' => 0,'message' => "Password maximum character length is 20"], 200);
        }

        try
        {
            $user = User::findOrFail($request->UserID);
            $user->email = $request->UserEmail;
            $user->username = $request->Username;
            $user->first_name = $request->Fname;
            $user->last_name = $request->Lname;
            $user->age = $request->Age;
            $user->country = $request->Country;

            if($request->time_zone)
                $user->timezone = $request->time_zone;

            $user->sys_user_role_id = $request->RoleType;
            //$user->password = md5($request->Password);
            $user->password = $request->Password;
            
            $user->update();

            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try
        {
            User::destroy($request->userID);
            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
