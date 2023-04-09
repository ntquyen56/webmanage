<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\roles;
use App\Models\User;
use App\Models\user_role;
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
        $allRole = roles::all();
        $arrRole = [];
        $arrSubRole = [];

        foreach($allUser as $user){
            foreach($user->roles as $role){
                array_push($arrRole,$role->role_id);
                if($role->role_id == 2 || $role->role_id == 4){

                    $arrSubRole[$role->role_id] = $role->sub_role;
                }
            }


            $user->arrRole = $arrRole;
            $user->arrSubRole = $arrSubRole;
            $arrRole = [];
            $arrSubRole = [];

            // dd($user->arrSubRole[2]);
        }
        // dd($arrSubRole);
        return view('admin.role',compact('allUser','allKhoa','allRole'));
    }


    public function handleGrantPossition(Request $req){
        try{
            $user = User::where('id',$req->user_id)->first();
            if($req->clear){
                user_role::where('user_id',$user->id)->delete();

            return redirect()->back();

            }
            if(empty($user)) return  redirect()->back()->with('msg','Account khong ton tai');
            user_role::where('user_id',$user->id)->delete();
            if(count($req->position) > 0 ){
                foreach($req->position as $role){
                    if($role == 1 || $role == "1"){
                        $kt = user_role::where('role_id',1)->where('id_khoa',$user->id_khoa)->where('user_id','<>',$user->id)->first();
                        if(!empty($kt))
                        return redirect()->back()->with('msg','Truong khoa da ton tai');

                        $new_user_role = new user_role();
                        $new_user_role->user_id = $user->id;
                        $new_user_role->role_id = $role;
                        $new_user_role->id_khoa = $user->id_khoa;

                        $new_user_role->save();
                    }

                    if($role == 2 || $role == "2"){
                        if($req->sub_position_hdt == 'Chủ tịch' || $req->sub_position_hdt == 'Thư kí'){

                            $kt = user_role::where('role_id',2)->where('sub_role',$req->sub_position_hdt)->where('user_id','<>',$user->id)->first();
                            if(!empty($kt)) return redirect()->back()->with('msg',$req->sub_position_hdt.' da ton tai');
                        }

                        $new_user_role = new user_role();
                        $new_user_role->user_id = $user->id;
                        $new_user_role->role_id = $role;
                        $new_user_role->id_khoa = $user->id_khoa;
                        $new_user_role->sub_role = $req->sub_position_hdt;


                        $new_user_role->save();
                    }
                    if($role == 4 || $role == "4"){
                        if($req->sub_position_hdnt == 'Chủ tịch' || $req->sub_position_hdnt == 'Thư kí'){

                            $kt = user_role::where('role_id',4)->where('sub_role',$req->sub_position_hdnt)->where('user_id','<>',$user->id)->first();
                            if(!empty($kt)) return redirect()->back()->with('msg',$req->sub_position_hdnt.' da ton tai');
                        }
                        $new_user_role = new user_role();
                        $new_user_role->user_id = $user->id;
                        $new_user_role->role_id = $role;
                        $new_user_role->id_khoa = $user->id_khoa;
                        $new_user_role->sub_role = $req->sub_position_hdnt;


                        $new_user_role->save();
                    }
                }
            }


            return redirect()->back();
        }catch(\Exception $e){
            return throw new($e->getMessage());

        }
    }

}
