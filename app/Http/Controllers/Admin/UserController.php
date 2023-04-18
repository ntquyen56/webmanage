<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Faculty;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function  listUser (){
        $users = User::all();
        $total_user = User::all()->count();
        return view('admin.user',compact('users'));
    }

    public function detail_user($id){
        $user = User::join('khoa','users.id_khoa','=','khoa.id_khoa')
        ->join('trinh_do','users.id_trinhdo','=','trinh_do.id_trinhdo')
        ->where('id',$id)
        ->get();
        return view('admin.detail_user',compact('user'));
    }


    public function showFrom (Request $req){
        try{

            $allKhoa = Faculty::all();
            $allTrinhDo = Level::all();
            return view('admin.add_user',compact('allKhoa', 'allTrinhDo'));
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function createAccountUser(Request $req){
        try{
            // dd($req->input());
            $isValidEmail = User::where('email',$req->email)->first();
            if($isValidEmail) return redirect()->route('admin.add_user')->with('msg','Email đã tồn tại');
            $password = Str::random(10);
            $hashPash =  Hash::make($password);
            $newUser  = new User();

            $newUser->password= $hashPash;
            $newUser->name = $req->tengv;
            $newUser->email = $req->email;
            $newUser->lienhe = $req->lienhe;
            $newUser->id_khoa = $req->khoa;
            $newUser->id_trinhdo = $req->trinhdo;
            $newUser->ngaysinh = $req->ngaysinh;
            $newUser->gioitinh = $req->gioitinh;
            $newUser->diachi = $req->diachi;
            $newUser->group_id = 10;
            $newUser->magv = $req->magv;




            if($newUser->save()){
                $mailData['password'] = $password;

                  Mail::to($req->email)->send( new SendMail($newUser,$mailData));

                  return redirect()->route('manage.user');

            }else{
                return redirect()->route('admin.add_user')->with('msg','Thêm thất bại');
            }



            //pass = radom
            //ádasdas

            //save




            // Mail::to($user->email)->send( new SendMailForgotPassword($user,$mailData));

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function edit_user($id){

        $allKhoa = Faculty::all();
        $allTrinhDo = Level::all();
        $user = User::where('id',$id)->first();
        // dd($user->id);
        return view('admin.edit_user',compact('allTrinhDo','allKhoa','user'));
    }

    public function handle_edit_user(Request $req, $id){
        $user  =  User::where('id',$id)->first();
        if(!$user) return  throw new \Exception('user khong ton tai');
        $user->name = $req->tengv;
        $user->lienhe = $req->lienhe;
        $user->id_khoa = $req->khoa;
        $user->id_trinhdo = $req->trinhdo;
        $user->ngaysinh = $req->ngaysinh;
        $user->gioitinh = $req->gioitinh;
        $user->diachi = $req->diachi;


        $user->update();

        return redirect()->route('manage.user');

    }


    public function delete_user($id){
        User::find($id)->delete();
        return redirect()->back();
    }
}
