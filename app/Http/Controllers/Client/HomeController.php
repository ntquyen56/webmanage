<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\Faculty;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function pageHome(){
        $allGiaoTrinh = Curriculum::whereNotNull('status')->limit(3)->get();
        $user = User::where('id',Auth::user()->id)->first();

        return view('home',compact('allGiaoTrinh','user'));
    }

    public function  showFromUpdate(){
        $allKhoa = Faculty::all();
        $allTrinhDo = Level::all();
        $user = User::where('id',Auth::user()->id)->first();
        // dd($user);
        return view('update_info',compact('allTrinhDo','allKhoa','user'));
    }


    public function handle_update_info(Request $req){
        try{
            $user  =  User::where('id',Auth::user()->id)->first();
            if(!$user) return  throw new \Exception('user khong ton tai');
            $user->name = $req->tengv;
            $user->lienhe = $req->lienhe;
            $user->id_khoa = $req->khoa;
            $user->id_trinhdo = $req->trinhdo;
            $user->ngaysinh = $req->ngaysinh;
            $user->gioitinh = $req->gioitinh;
            $user->diachi = $req->diachi;


            $user->update();


            $allGiaoTrinh = Curriculum::limit(3)->get();
            $user = User::where('id',Auth::user()->id)->first();
            return view('home',compact('allGiaoTrinh','user'));

        }catch(\Exception $e){
            return throw new \Exception($e->getMessage());
        }
        // $allGiaoTrinh = Curriculum::limit(3)->get();
        // return view('home',compact('allGiaoTrinh'));
    }
}
