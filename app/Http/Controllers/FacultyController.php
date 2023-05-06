<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Support\Facades\Redirect;

class FacultyController extends Controller
{
    public function faculty_list(){
        $list = Faculty::orderBy('id_khoa', 'desc')->get();
        return view('admin.faculty_list')
            ->with('list', $list);
    }
    public function add_khoa(Request $request){
        $isValidEmail = Faculty::where('ma_khoa',$request->ma_khoa)->first();
        if($isValidEmail) return redirect()->back()->with('msg','Mã đơn vị đã tồn tại!');
        $data = $request->all();
        $khoa = new Faculty();
        $khoa->ma_khoa = $data['ma_khoa'];
        $khoa->ten_khoa = $data['ten_khoa'];
        $khoa->save();
        return Redirect::to('manage/add_faculty');
    }
    public function edit_khoa($id_khoa){
        $edit = Faculty::find($id_khoa);
        return view('admin.edit_faculty')
            ->with('edit', $edit);
    }
    public function update_khoa(Request $request, $id_khoa){
        $data = $request->all();
        $khoa = Faculty::find($id_khoa);
        $khoa->ma_khoa = $data['ma_khoa'];
        $khoa->ten_khoa = $data['ten_khoa'];
        $khoa->save();
        return Redirect::to('manage/faculty_list');
    }
    public function delete_khoa($id_khoa){
        Faculty::find($id_khoa)->delete();
        return redirect()->back();
    }
}
