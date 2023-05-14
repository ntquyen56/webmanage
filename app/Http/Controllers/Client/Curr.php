<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\dang_ki_bien_soan;
use App\Models\Faculty;
use App\Models\Term;
use App\Models\Type;
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
            $allHocPhan = Term::all();
            $allGiaoTrinh = Curriculum::all();

            $allLoai = Type::all();
            $allGiangVien = User::where('group_id','<>',1)->where('id','<>',Auth::user()->id)->get();



            return view('register',compact('allKhoa','allHocPhan','allLoai','allGiangVien','allGiaoTrinh'));
        }catch(\Exception $e ){
            throw new($e->getMessage());

        }
    }


    /**
     * @param $request input
     * @return void
     */
    public function registerCurr(Request $req){

        try{
            // dd($req->input());
            if($req->loaigt == 'GT'){

                $hocphan = Term::where('ma_hp',$req->ma_hp)->first();
                if(empty($hocphan)) return redirect()->back()->with('msg','Học phần không tồn tại!');
            }



            $dkgt = dang_ki_bien_soan::where('ma_gt',$req->ma_hp)->orWhere('ten_gt',$req->tengt)->first();
            if(!empty($dkgt)) return redirect()->back()->with('msg','Học phần đã được Đăng ký!');


            $allTacgia = $req->tacgia;

            $newDKBS = new dang_ki_bien_soan();
            if($req->loaigt == 'GT'){

                $newDKBS->ma_gt = $req->ma_hp;
                $newDKBS->ten_gt = $hocphan->ten_hp;

            }else{
                $newDKBS->ma_gt = '';
                if(empty($req->tengt)) return redirect()->back()->with('msg','Bạn phải nhập Tên tài liệu tham khảo!');
                $newDKBS->ten_gt = $req->tengt;

            }
            $newDKBS->loai_gt = $req->loaigt;
            $newDKBS->id_khoa = $req->khoa;
            $newDKBS->save();
            if(count($allTacgia) > 0 ){

                foreach($allTacgia as $matacgia){
                    $tacgia = User::where('magv',$matacgia)->first();
                    
                    $newUserGt = new user_gtdk();
                    
                    $newUserGt->user_id = $tacgia->id;
                    
                    $newUserGt->giaotrinh_id = $newDKBS->id;
                    $newUserGt->save();
                }
            }
            $newUserGt = new user_gtdk();
            $newUserGt->user_id = Auth::user()->id;
            $newUserGt->giaotrinh_id = $newDKBS->id;
            $newUserGt->save();

            return redirect()->back()->with('success','Đăng ký biên soạn thành công!');

        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }

    public function showCalendar(){
        try{
            $dkbsList = dang_ki_bien_soan::whereNotNull('statusNT')->whereNotNull('fileQD')->get();
            // dd($dkbsList);
            return view('calendar',compact('dkbsList'));
        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }

    public function showDKBS_THUKI(){
        try{
            $dkbsList = dang_ki_bien_soan::whereNotNull('statusNT')->whereNotNull('fileQD')->where('stausBienBanNT',1)->whereHas('users', function($q){
                $q->where('users.id',Auth::user()->id);
            })->get();
            // dd($dkbsList);
            return view('result',compact('dkbsList'));
        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }
}
