<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function listUser(){
        $users= User::all();
        return view('admin.permission',compact('users'));
    }


    public function  handle_permission(Request $req) {
        try{
            // dd($req->input());
            $role = $req->role;
            $user = User::where('id', $req->id_user)->first();
            if(!$user) return redirect()->back();


            $user->group_id = $role;
            $user->save();

            return redirect()->back();
        }catch(\Exception $e){
             throw new($e->getMessage());
        }
    }
}
