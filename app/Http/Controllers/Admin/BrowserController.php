<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dang_ki_bien_soan;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            foreach($allGiaotrinhKhoa as $gt){
                $gt->users = $gt->users;
                $gt->khoa = $gt->khoa;
                if(empty($gt->tongdiem)){
                    $gt->statusTongDiem = 0;
                    $gt->caculateDiem = '0/7';

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


                    $gt->caculateDiem = (string)($tongDiem).'/7';

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
                    if(count($arr) == 7){
                        foreach($arr as $key=>$item){
                            if($item == 1 || $item == "1") $tongDiem++;

                        }

                        if($tongDiem >3) {
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
}
