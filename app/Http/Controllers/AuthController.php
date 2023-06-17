<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    function checkUserLogin(Request $request){

        try {
            $user = User::where('username',$request->UserName)->first();
            //adminRolePermission is 1 get from role table
            
            try {
                $adminRolePermission = $user->userRole->sys_user_role_id;
            } catch (\Exception $e) {
                $adminRolePermission = "";
            }

            if($user && $adminRolePermission == 1){
                if($user->password == $request->Password){
                //if($user->password == md5($request->Password)){
                    $userID = $user->user_id ;
                    $request->session()->put('userID',$userID);
                    return redirect('/');
    
                }else{
                    $request->session()->flash('warning', 'Invailed Password!');
                    return back();
                }
    
            }else{
                $request->session()->flash('warning', 'No Account Found For This User Name!');
                return back();
            }
        } catch (\Exception $e) {
            $request->session()->flash('warning', 'No Account Found !');
        }

     }
 
     function userLogOut(){
 
         if(session()->has('userID')){
             session()->forget('userID');
 
         }
         
         return redirect('login');
     }
}
