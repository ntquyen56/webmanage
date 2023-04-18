<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Support\Facades\Redirect;

class TermController extends Controller
{
    public function term(){
        $list = Term::orderBy('id_hp', 'desc')->get();
        return view('admin.term')
            ->with('list', $list);
    }
    public function add_hp(Request $request){
        $data = $request->all();
        $hp = new Term();
        $hp->ma_hp = $data['ma_hp'];
        $hp->ten_hp = $data['ten_hp'];
        $hp->tinchi = $data['tinchi'];
        $hp->save();
        return Redirect::to('manage/add_term');
    }
    public function edit_hp($id_hp){
        $edit = Term::find($id_hp);
        return view('admin.edit_term')
            ->with('edit', $edit);
    }
    public function update_hp(Request $request, $id_hp){
        $data = $request->all();
        $hp = Term::find($id_hp);
        $hp->ma_hp = $data['ma_hp'];
        $hp->ten_hp = $data['ten_hp'];
        $hp->tinchi = $data['tinchi'];
        $hp->save();
        return Redirect::to('manage/term');
    }
    public function delete_term($id_hp){
        Term::find($id_hp)->delete();
        return redirect()->back();
    }
}
