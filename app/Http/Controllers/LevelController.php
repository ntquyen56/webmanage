<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Support\Facades\Redirect;

class LevelController extends Controller
{
    public function level_list(){
        $list = Level::orderBy('id_trinhdo', 'desc')->get();
        return view('admin.level_list')
            ->with('list', $list);
    }
    public function add_trinhdo(Request $request){
        $data = $request->all();
        $trinhdo = new Level();
        $trinhdo->ma_trinhdo = $data['ma_trinhdo'];
        $trinhdo->ten_trinhdo = $data['ten_trinhdo'];
        $trinhdo->save();
        return Redirect::to('manage/add_level');
    }
    public function edit_trinhdo($id_trinhdo){
        $edit = Level::find($id_trinhdo);
        return view('admin.edit_level')
            ->with('edit', $edit);
    }
    public function update_trinhdo(Request $request, $id_trinhdo){
        $data = $request->all();
        $trinhdo = Level::find($id_trinhdo);
        $trinhdo->ma_trinhdo = $data['ma_trinhdo'];
        $trinhdo->ten_trinhdo = $data['ten_trinhdo'];
        $trinhdo->save();
        return Redirect::to('manage/level_list');
    }
    public function delete_trinhdo($id_trinhdo){
        Level::find($id_trinhdo)->delete();
        return redirect()->back();
    }
}

