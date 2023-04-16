<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dang_ki_bien_soan;
use App\Models\User;
use App\Models\user_hdnt;
use App\Models\user_role;
use App\Traits\StorageImageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
class BrowserController extends Controller
{
    //
    use StorageImageTrait;

    public function showListBrowserOne(Request $req){
        try{
            $allGiaotrinhKhoa = dang_ki_bien_soan::where('id_khoa',Auth::user()->id_khoa)->get();
            foreach($allGiaotrinhKhoa as $gt){
                $gt->users = $gt->users; // posts is already loaded and no additional DB query is run
            }
            // dd($allGiaotrinhKhoa);
            return view('admin.browser_one',compact('allGiaotrinhKhoa'));
        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }

    public function hanle_browser_one(Request $req){
        try{
            $dkbs = dang_ki_bien_soan::where('id',$req->id_dk)->first();


            if(empty($dkbs)) return redirect()->back()->with('msg','Giao trinh dang kis khong ton tai!');



            $dkbs->status = 1;

            $dkbs->save();


            return redirect()->back()->with('success','Duyet giao trinh thanh cong!');
        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }



    public function showListBrowserTwo(Request $req){
        try{
            $allGiaotrinhKhoa = dang_ki_bien_soan::where('status',1)->get();
            $countHDT = user_role::where('role_id',2)->get();
            foreach($allGiaotrinhKhoa as $gt){
                $gt->users = $gt->users;
                $gt->khoa = $gt->khoa;
                if(empty($gt->tongdiem)){
                    $gt->statusTongDiem = 0;
                    $gt->caculateDiem = '0/'. $countHDT->count();

                }else{
                    $gt->statusTongDiem = 0;

                    $arr = json_decode($gt->tongdiem,true);
                    $tongDiem =0;
                    foreach($arr as $key=>$item){
                        if($item == 1 || $item == "1") $tongDiem++;
                        if($key == Auth::user()->id){
                                 $gt->statusTongDiem = 1;

                        }
                    }


                    $gt->caculateDiem = (string)($tongDiem).'/'.$countHDT->count();

                }
                // posts is already loaded and no additional DB query is run
            }
            // dd($allGiaotrinhKhoa);
            return view('admin.browser_two',compact('allGiaotrinhKhoa'));
        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }

    public function hanle_browser_two(Request $req){
        try{
            $dkbs = dang_ki_bien_soan::where('id',$req->id_dk)->first();


            if(empty($dkbs)) return redirect()->back()->with('msg','Giao trinh dang kis khong ton tai!');


            $arr = json_decode($dkbs->tongdiem,true);
            if(empty($arr)){
                $arr = [];
                $arr[Auth::user()->id] = $req->status;
                $arrJson = json_encode($arr);

                $dkbs->tongdiem = $arrJson;

                $dkbs->save();

            }else{
                $arr[Auth::user()->id] = $req->status;
                $arrJson = json_encode($arr);

                $dkbs->tongdiem = $arrJson;

                $dkbs->save();
            }



            return redirect()->back()->with('success','Duyet giao trinh thanh cong!');
        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }



    public function showListCurrRegisterClient(Request $req){
        try{
            $gtdk = dang_ki_bien_soan::whereHas('users', function($q){
                $q->where('users.id',Auth::user()->id);
            })->get();
            $mesageStatus = "Đang chờ duyệt";
            $browsered = 0;
            foreach($gtdk as $gt){
                $gt->users = $gt->users;

                if(empty($gt->tongdiem)){

                    $mesageStatus = "Đang chờ duyệt";


                }else{
                    $tongDiem =0;

                    $arr = json_decode($gt->tongdiem,true);
                    $countHDT = user_role::where('role_id',2)->get();

                    if(count($arr) >= $countHDT->count()){
                        foreach($arr as $key=>$item){
                            if($item == 1 || $item == "1") $tongDiem++;

                        }

                        if($tongDiem > ($countHDT->count()/2)) {
                            $mesageStatus = "Đã được duyệt";
                            $browsered =1;
                        }else{
                            $mesageStatus = "Từ chối";

                        }

                    }else{
                        $mesageStatus = "Đang chờ duyệt";

                    }
                }// posts is already loaded and no additional DB query is run


                $gt->messageStatus = $mesageStatus;
                $gt->browsered = $browsered;
                $browsered =0;

            }
            if(!empty($req->query('page')) && $req->query('page') == "calender"){
                $allHDNT =  User::whereHas('roles' , function (Builder $query) {
                    $query->where('roles.id', 4);
                })->get();
                // foreach($allHDNT as $user){
                //     $user->roles = $user->roles;
                // }
                return view('regis_calendar',compact('gtdk','allHDNT'));

            }
            return view('compilation',compact('gtdk'));
        }catch(\Exception $e){
            return throw new($e->getMessage());
        }
    }


    public function upload_document(Request $req){
        try{
            $dataImage = $this->storageTraitUpload($req, 'file_upload', 'document');

            $dkbs = dang_ki_bien_soan::where('id',$req->id_dk)->first();

            $dkbs->file_upload = $dataImage['file_path'];
            $dkbs->file_name = $dataImage['file_name'];


            $dkbs->save();

            return redirect()->back()->with('msg','Upload thành công!');

        }catch(\Exception $e){
            return throw new ($e->getMessage());
        }
    }

    public function registerHDNTAndDateSubmit(Request $request){
        try{
            $date = $request->dateNT;
            if(Carbon::now()->gt($date)){
                return redirect()->back()->with('msg',"Ngày nộp phải lớn hơn ngày hiện tại!");
            }else{
                $gtdk = dang_ki_bien_soan::where('id',$request->id_gtdk)->first();
                if(empty($gtdk)) return redirect()->back()->with('msg',"Giáo trình không tồn tại!");
                $gtdk->dateNT = $date;
                $gtdk->save();



                if(count($request->hdnt) > 0){
                    foreach($request->hdnt as $hdnt){
                        $gtdk_hndt = new user_hdnt();

                        $gtdk_hndt->gtdk_id = $request->id_gtdk;
                        $gtdk_hndt->hdnt_id = $hdnt;

                        $gtdk_hndt->save();

                    }
                }


                return redirect()->back()->with('success',"Đăng ký thành công!");


            }

            // return 1;
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


    public function listNT(Request $req){
        try{
            $gtdk_list = dang_ki_bien_soan::whereNotNull('dateNT')->get();
            foreach($gtdk_list as $gt){
                $gt->users = $gt->users;
                $gt->hdnts = $gt->hdnts;

            }
            // dd($gtdk_list);
            return view('admin.date',compact('gtdk_list'));
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function admin_brow_date(Request $request){
        try{
            $id_gtdk = $request->id_gtdk;
            $gtdk = dang_ki_bien_soan::where('id',$id_gtdk)->first();
            if(!empty($request->status )  && $request->status =='khongduyet'){

                $gtdk->statusNT = $request->status;


            }else{
                $ma_duyet = $request->ma_duyet;

                $gtdk->statusNT = $ma_duyet;
            }
            $gtdk->save();

            return redirect()->back();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


    public function show_list_nt(){
        $list_nt = user_hdnt::where('hdnt_id',Auth::user()->id)->get();
        foreach($list_nt as $item){
            $item->gtdk = $item->gtdk;
        }
        // dd($list_nt);
        return view('admin.acceptance_list',compact('list_nt'));
    }
}
