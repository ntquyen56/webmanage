<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LocationController extends Controller
{
    public function location_list(){
        $list = Location::orderBy('id_dd', 'desc')->get();
        return view('admin.location')
            ->with('list', $list);
    }
    public function add_diadiem(Request $request){
        $data = $request->all();
        $diadiem = new Location();
        $diadiem->phong = $data['phong'];
        $diadiem->khuvuc = $data['khuvuc'];
        $diadiem->save();
        return Redirect::to('manage/add_location');
    }
    public function edit_diadiem($id_dd){
        $edit = Location::find($id_dd);
        return view('admin.edit_location')
            ->with('edit', $edit);
    }
    public function update_diadiem(Request $request, $id_dd){
        $data = $request->all();
        $diadiem = Location::find($id_dd);
        $diadiem->phong = $data['phong'];
        $diadiem->khuvuc = $data['khuvuc'];
        $diadiem->save();
        return Redirect::to('manage/location');
    }
    public function delete_diadiem($id_dd){
        Location::find($id_dd)->delete();
        return redirect()->back();
    }
}
