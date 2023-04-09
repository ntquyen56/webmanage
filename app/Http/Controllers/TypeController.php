<?php

namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TypeController extends Controller
{
    public function typecurr(){
        $list = Type::orderBy('id_loai', 'desc')->get();
        return view('admin.type_curr')
            ->with('list', $list);
    }
    public function add_loai(Request $request){
        $data = $request->all();
        $loai = new Type();
        $loai->ma_loai = $data['ma_loai'];
        $loai->ten_loai = $data['ten_loai'];
        $loai->save();
        return Redirect::to('manage/add_typecurr');
    }
    public function edit_loai($id_loai){
        $edit = Type::find($id_loai);
        return view('admin.edit_typecurr')
            ->with('edit', $edit);
    }
    public function update_loai(Request $request, $id_loai){
        $data = $request->all();
        $loai = Type::find($id_loai);
        $loai->ma_loai = $data['ma_loai'];
        $loai->ten_loai = $data['ten_loai'];
        $loai->save();
        return Redirect::to('manage/type_curr');
    }
    public function delete_loai($id_loai){
        Type::find($id_loai)->delete();
        return redirect()->back();
    }
}
