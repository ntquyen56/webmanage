<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\dang_ki_bien_soan;
use App\Models\User;
use App\Models\Location;
use App\Models\user_hdnt;
use App\Models\user_role;
use App\Traits\StorageImageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

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
            // dd($dkbs->users);
            if(empty($dkbs)) return redirect()->back()->with('msg','Giáo trình đăng ký không tồn tại!');

            $dkbs->status = $req->status;
            $dkbs->save();
            if($req->status == 1){
                foreach($dkbs->users as $user){
                    $mailData['message'] = 'Giáo trình '.$dkbs->ten_gt.' đã được duyệt';
                    Mail::to($user->email)->send( new SendMail($user,$mailData));
                }
            }else{
                foreach($dkbs->users as $user){
                    $mailData['message'] = 'Giáo trình '.$dkbs->ten_gt.' đã bị từ chối';
                    Mail::to($user->email)->send( new SendMail($user,$mailData));
                }
            }









            return redirect()->back()->with('success','Duyệt giáo trình thành công!');
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

            $checkDaduyet = 0;
            $checKhongduyet = 0;

            foreach( $arr as $bro){
                if($bro == 1){
                    $checkDaduyet++;
                }else{
                    $checKhongduyet++;
                }
            }



            if($checkDaduyet > count($arr)/2){
                foreach($dkbs->users as $user){
                    $mailData['message'] = 'Giáo trình '.$dkbs->ten_gt.' đã được duyệt bởi HDT';
                    Mail::to($user->email)->send( new SendMail($user,$mailData));
                }
            }
            if($checKhongduyet > count($arr)/2){
                foreach($dkbs->users as $user){
                    $mailData['message'] = 'Giáo trình '.$dkbs->ten_gt.' đã bị từ chối bởi HDT';
                    Mail::to($user->email)->send( new SendMail($user,$mailData));
                }
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

                    if(count($arr) >= $countHDT->count()/2){
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
                $allDiadiem = Location::get();
                // $allRole = user_role::get();
                // foreach($allHDNT as $user){
                //     $user->roles = $user->roles;
                // }
                return view('regis_calendar',compact('gtdk','allHDNT','allDiadiem'));

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
                $diadiem = Location::where('id_dd',$request->diadiem)->first();

                if(empty($gtdk)) return redirect()->back()->with('msg',"Giáo trình không tồn tại!");
                $gtdk->dateNT = $date;
                $gtdk->diadiem = $diadiem->phong.' - '.$diadiem->khuvuc;

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

            $dataImage = $this->storageTraitUpload($request, 'file_qd', 'document');


            $gtdk->fileQD = $dataImage['file_path'];

            if(!empty($request->status )  && $request->status =='khongduyet'){

                $gtdk->statusNT = $request->status;


            }else{
                $ma_duyet = $request->ma_duyet;

                $gtdk->statusNT = $ma_duyet;
            }
            $gtdk->save();


            foreach($gtdk->users as $user){
                $mailData['message'] = 'Giáo trình '.$gtdk->ten_gt.' đã được duyệt bởi Chủ Tịch Hội Đồng Nghiệm Thu';
                $mailData['file'] = 'http://127.0.0.1:8000'.$dataImage['file_path'];

                Mail::to($user->email)->send( new SendMail($user,$mailData));
            }


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

    public function show_bbhdnt(){
        // $list_nt = user_hdnt::where('hdnt_id',Auth::user()->id)->get();
        // foreach($list_nt as $item){
        //     $item->gtdk = $item->gtdk;
        // }
        // dd($list_nt);
        return view('admin.acceptance');
    }

    // public function showDD(){
    //     $allDiadiem = Location::get();
    //     return view('regis_calender',compact('allDiadiem'));
    // }
}
