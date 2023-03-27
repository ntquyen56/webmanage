<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function pageHome(){
        $allGiaoTrinh = Curriculum::limit(3)->get();
        return view('home',compact('allGiaoTrinh'));
    }
}
