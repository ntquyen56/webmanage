<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
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
            return throw new($e->getMessage());

        }
    }



    public function showListRole(){
        $allUser = User::where('group_id','<>',1)->get();
        $allKhoa = Faculty::all();

        return view('admin.role',compact('allUser','allKhoa'));
    }


    public function handleGrantPossition(Request $req){
        try{

            $user = User::where('id',$req->user_id)->first();
            if($req->clear){
                $user->position =0;
                $user->save();
            return redirect()->back();

            }
            if(empty($user)) return  redirect()->back()->with('msg','Account khong ton tai');

            if($req->position ==2){
                $kt = User::where('position',2)->where('id_khoa',$user->id_khoa)->first();
                if(!empty($kt))
                 return redirect()->back()->with('msg','Truong khoa da ton tai');
            }
            $user->position = $req->position;

            $user->save();

            return redirect()->back();
        }catch(\Exception $e){
            return throw new($e->getMessage());

        }
    }

}
