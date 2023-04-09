<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\dang_ki_bien_soan;
use App\Models\Faculty;
use App\Models\User;
use App\Models\user_gtdk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Curr extends Controller
{
    //
    public function showFromRegister(){
        try{
            $allKhoa = Faculty::all();
            return view('register',compact('allKhoa'));
        }catch(\Exception $e ){
            throw new($e->getMessage());

        }
    }
    public function registerCurr(Request $req){

        try{
            $giaotrinh = Curriculum::where('ma_gt',$req->magt)->first();
            $dkgt = dang_ki_bien_soan::where('ma_gt',$req->magt)->first();
            if(!empty($dkgt)) return redirect()->back()->with('msg','Giao trinh đã được đăng kí!');

            if(empty($giaotrinh)) return redirect()->back()->with('msg','Giao trinh khong ton tai');

            $allTacgia = explode('-', $req->allTacGia);

            $check = 0;
            foreach($allTacgia as $matacgia){
                $tacgia = User::where('magv',$matacgia)->first();
                if(empty($tacgia)){
                    $check =1;
                    break;
                }
                $check =0;
            }

            if($check == 1 ) return redirect()->back()->with('msg','Ma tac gia chua dung! Vui long kiem tra lai.');


            $newDKBS = new dang_ki_bien_soan();

            $newDKBS->ma_gt = $req->magt;

            $newDKBS->ten_gt = $giaotrinh->ten_gt;
            $newDKBS->loai_gt = $req->loaigt;
            $newDKBS->id_khoa = $req->khoa;


            $newDKBS->save();


            foreach($allTacgia as $matacgia){
                $tacgia = User::where('magv',$matacgia)->first();

                $newUserGt = new user_gtdk();

                $newUserGt->user_id = $tacgia->id;

                $newUserGt->giaotrinh_id = $newDKBS->id;


                $newUserGt->save();
            }
            $newUserGt = new user_gtdk();
            $newUserGt->user_id = Auth::user()->id;
            $newUserGt->giaotrinh_id = $newDKBS->id;
            $newUserGt->save();

            return redirect()->back()->with('success','Dang ky giao trinh thanh cong');








        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }
}
