<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CurriculumController extends Controller
{

     const PER_PAGE = 10;

    public function createaCurriculum(Request $req){
        try{

             $curriculum = new Curriculum();
             $curriculum->id = $req->id;
             $curriculum->ma_gt = $req->magt;
             $curriculum->ten_gt = $req->tengt;
             $curriculum->save();


             return redirect()->route('manage.registration_list');

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function getPagination (){
        try{

            $curriculums = Curriculum::orderBy('created_at', 'desc');
            $curriculums =   $curriculums->paginate(self::PER_PAGE);

            $checkStatus = Curriculum::where('statusInt',0)->get();
            // dd(!empty($checkStatus),$checkStatus);
            $check =1;
            if(($checkStatus->count() > 0)) $check =0;
            // dd($checkStatus->count() > 0);
            return view('admin.registration_list',compact('curriculums','check'));


        }catch(\Exception $e){
            throw new \Exception($e->getMessage());

        }
    }

    public function handle_update_status_curriculum(Request $req){
        try{
            if(Carbon::now()->gt($req->dateStart)) return redirect()->back()->with('msg','Ngày bắt đầu phải lớn hơn ngày hiện tại');
            if(Carbon::create($req->dateStart)->gt($req->dateEnd)) return redirect()->back()->with('msg','Ngày bắt đầu phải nhỏ hơn ngày kêt thúc');

            Curriculum::where('id','<>',0)->update([
                'dateStart'=>$req->dateStart,
                'dateEnd'=>$req->dateEnd,

            ]);


            return redirect()->back();
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());

        }
    }

    public function listCurriculum(){

        $allGiaoTrinh = Curriculum::all();
        // dd($allGiaoTrinh);
        return view('curriculum',compact('allGiaoTrinh'));

    }

    public function delete_gt($id){
        Curriculum::find($id)->delete();
        return redirect()->back();
    }


}
