<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\dang_ki_bien_soan;
use App\Models\User;
use App\Models\bienban_nt_thuky;

use App\Models\danhgia_nt;

use App\Models\Location;
use App\Models\config;

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
            $hdt = user_role::where('role_id',2)->get();

            if($checkDaduyet > count( $hdt)/2){
                foreach($dkbs->users as $user){
                    $mailData['message'] = 'Giáo trình '.$dkbs->ten_gt.' đã được duyệt bởi HDT';
                    Mail::to($user->email)->send( new SendMail($user,$mailData));
                }
            }
            if($checKhongduyet > count( $hdt)/2){
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
            // dd(array_key_exists('file_upload', $req->file()));
        // dd($req->hasFile('file_upload'));

        // dd($req->file('file_upload'));

            $dataImage = $this->storageTraitUpload($req, 'file_upload', 'document');
            // dd($dataImage);
            $dkbs = dang_ki_bien_soan::where('id',$req->id_dk)->first();

            $dkbs->file_upload = $dataImage['file_path'];
            $dkbs->file_name = $dataImage['file_name'];
            $dkbs->statusNopFile = 1;



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


            $gtdk->fileQD = $dataImage['file_path'] ?? "";

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

    public function show_bbhdnt($id){
        // $list_nt = user_hdnt::where('hdnt_id',Auth::user()->id)->get();
        // foreach($list_nt as $item){
        //     $item->gtdk = $item->gtdk;
        // }
        // dd($list_nt);

        $dkbs = dang_ki_bien_soan::where('id',$id)->first();
        $config = config::all();
        $danhgia_nt = danhgia_nt::where('user_danhgia',Auth::user()->id)->where('id_giaotrinh',$id)->first();
        if(!empty($danhgia_nt)) return view('admin.acceptanced',compact('dkbs','config','danhgia_nt'));

        return view('admin.acceptance',compact('dkbs','config'));
    }

    // public function showDD(){
    //     $allDiadiem = Location::get();
    //     return view('regis_calender',compact('allDiadiem'));
    // }


    public function danhgianghiemthu(Request $req)
    {
        try{
            // dd($req->input());

            $gtdk = dang_ki_bien_soan::where('id',$req->id_gt)->first();

            if(empty($gtdk)) return redirect()->back()->with('msg','Giao trinh khong ton tai!');

            $danhgia_nt = new danhgia_nt();     
            
            $danhgia_nt->user_danhgia = Auth::user()->id;
            $danhgia_nt->id_giaotrinh = $req->id_gt;

            $arr1 = $req->NDGT;
            if(!empty($req->muc1)) array_push($arr1,$req->muc1??"");
            $danhgia_nt->nd_giaotrinh = json_encode($arr1);

         
            $arr2 = $req->KTTGT;

            if(!empty($req->muc2)) array_push($arr2,$req->muc2??"");
            $danhgia_nt->kt_giaotrinh = json_encode($arr2);

            $arr3 = $req->NDDTD;

            if(!empty($req->muc3)) array_push($arr3,$req->muc3??"");
            $danhgia_nt->ndtd_giaotrinh = json_encode($arr3);


            if(empty($req->muc4)) return redirect()->back()->with('msg','Noi dung dinh dang khong the trong!');

            $danhgia_nt->ddcautruc_gt = $req->muc4;

            $danhgia_nt->dtsd = json_encode($req->DTDSD);
            
            $danhgia_nt->ketluan = ($req->DNVKL);

            
            $danhgia_nt->nd_ketluan = ($req->muc5);

            $danhgia_nt->save();

            return redirect()->back()->with('success_msg', 'Danh gia thanh cong!');

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    function show_list_nt_thuky (){
        try{
            $list_nt = user_hdnt::where('hdnt_id',Auth::user()->id)->get();
            // dd($list_nt);
            // $arr = [];





            foreach($list_nt as $item){
                $item->gtdk = $item->gtdk;
            }


        return view('admin.list_secretary',compact('list_nt'));

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    function detail_secretary($id){
        try{
            // dd($id);
        $dkbs = dang_ki_bien_soan::where('id',$id)->first();
        $config = config::all();
        $danhgia_nt =    danhgia_nt::where('id_giaotrinh',$id)->get();
        // dd($danhgia_nt);
        $data_danhgia = [];
        foreach($danhgia_nt as $item){
            $data_danhgia['nd_giaotrinh'] = array_merge($data_danhgia['nd_giaotrinh'] ?? [], json_decode($item->nd_giaotrinh,true));
            $data_danhgia['kt_giaotrinh'] = array_merge($data_danhgia['kt_giaotrinh'] ?? [], json_decode($item->kt_giaotrinh,true));
            $data_danhgia['ndtd_giaotrinh'] = array_merge($data_danhgia['ndtd_giaotrinh'] ?? [], json_decode($item->ndtd_giaotrinh,true));
            $data_danhgia['dtsd'] = array_merge($data_danhgia['dtsd'] ?? [], json_decode($item->dtsd,true));
            $data_danhgia['ketluan'][] = $item->ketluan;
            $data_danhgia['ddcautruc_gt'][] = $item->ddcautruc_gt;
            $data_danhgia['nd_ketluan'][] = $item->nd_ketluan	;


       
        }

        // dd($data_danhgia);
        $danhgia_thuky = bienban_nt_thuky::where('id_thuky',Auth::user()->id)->where('id_giaotrinh',$id)->first();
        if(!empty($danhgia_thuky)) return view('admin.secretaried',compact('dkbs','config','danhgia_nt','data_danhgia','danhgia_thuky'));
       
        return view('admin.secretary',compact('dkbs','config','danhgia_nt','data_danhgia'));
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    function detail_secretary_client($id){
        try{
            // dd($id);
        $dkbs = dang_ki_bien_soan::where('id',$id)->first();
        $config = config::all();
        $danhgia_nt =    danhgia_nt::where('id_giaotrinh',$id)->get();
        // dd($danhgia_nt);
        $data_danhgia = [];
        foreach($danhgia_nt as $item){
            $data_danhgia['nd_giaotrinh'] = array_merge($data_danhgia['nd_giaotrinh'] ?? [], json_decode($item->nd_giaotrinh,true));
            $data_danhgia['kt_giaotrinh'] = array_merge($data_danhgia['kt_giaotrinh'] ?? [], json_decode($item->kt_giaotrinh,true));
            $data_danhgia['ndtd_giaotrinh'] = array_merge($data_danhgia['ndtd_giaotrinh'] ?? [], json_decode($item->ndtd_giaotrinh,true));
            $data_danhgia['dtsd'] = array_merge($data_danhgia['dtsd'] ?? [], json_decode($item->dtsd,true));
            $data_danhgia['ketluan'][] = $item->ketluan;
            $data_danhgia['ddcautruc_gt'][] = $item->ddcautruc_gt;
            $data_danhgia['nd_ketluan'][] = $item->nd_ketluan	;


       
        }

        // dd($data_danhgia);
        $danhgia_thuky = bienban_nt_thuky::where('id_giaotrinh',$id)->first();
        // if(!empty($danhgia_thuky)) return view('admin.secretaried',compact('dkbs','config','danhgia_nt','data_danhgia','danhgia_thuky'));
        // $check = 0;
        // foreach (Auth::user()->roles_user as $role) {
        //     if ($role->role_id == 4 && $role->sub_role == 'Thư kí') {
        //         $check = 1;
        //         break;
        //     }
        // }
        // if($check == 0 ) 
        return view('secretaried',compact('dkbs','config','danhgia_nt','data_danhgia','danhgia_thuky'));
        // return view('admin.secretary',compact('dkbs','config','danhgia_nt','data_danhgia'));
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function danhgianghiemthu_thuky(Request $req){
        try{
            // dd($req->input());
            $danhgia_thuky = new bienban_nt_thuky();
            $danhgia_thuky->id_giaotrinh = $req->id_giaotrinh;
            $danhgia_thuky->id_thuky = Auth::user()->id;
            $danhgia_thuky->nd_giaotrinh = $req->muc2_2;
            $danhgia_thuky->kt_giaotrinh = $req->muckienthuc;
            $danhgia_thuky->ndtd_giaotrinh = $req->mucnoidung;
            $danhgia_thuky->ddcautruc_gt = $req->muc4;
            $danhgia_thuky->nd_ketluan = $req->muc5;
            $danhgia_thuky->status = $req->DNVKL;

            
            $danhgia_thuky->save();


            $dkbs = dang_ki_bien_soan::where('id',$req->id_giaotrinh)->first();

            $dkbs->stausBienBanNT = 1;
            $dkbs->save();

            return redirect()->back();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function show_publish_list(Request $req){
        $allGTXB = bienban_nt_thuky::all();
        return view('admin.publish_list',compact('allGTXB'));
    }


    public function download_docx(Request $req){
   
        $phpWord = new \PhpOffice\PhpWord\PhpWord();


        $section = $phpWord->addSection();


        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


        $section->addImage("https://scontent.fvca1-3.fna.fbcdn.net/v/t39.30808-6/345835459_1656579448100908_1598480259446593011_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=e3f864&_nc_ohc=MH3_YapcTFAAX-m-rC_&_nc_ht=scontent.fvca1-3.fna&oh=00_AfDiq8XMQb8GspG6nH8I-yUcRUVVoi-ODYPi_zQhgvpc4g&oe=645D9C10");
        $section->addText($description);
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 25, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            'The men',
            $fontStyleName
        );
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('helloWorld.docx'));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());

        }


        return response()->download(storage_path('helloWorld.docx'));
    }
}
