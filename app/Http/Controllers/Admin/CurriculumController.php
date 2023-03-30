<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{

     const PER_PAGE = 3;


    //
    public function createaCurriculum(Request $req){
        try{

             $curriculum = new Curriculum();
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
            return view('admin.registration_list',compact('curriculums'));


        }catch(\Exception $e){
            throw new \Exception($e->getMessage());

        }
    }

    public function listCurriculum(){
      
        $allGiaoTrinh = Curriculum::all();
        // dd($allGiaoTrinh);
        return view('curriculum',compact('allGiaoTrinh'));
    }
}
