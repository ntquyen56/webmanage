<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Term;
use  App\Models\dang_ki_bien_soan;
use  App\Models\bienban_nt_thuky;



use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(){
        return view('layout.login');
    }
    public function show_dashboard(){
        $allUser = count(User::all());
        $allHocPhan = count(Term::all());
        $allDKBS = count(dang_ki_bien_soan::all());
        $allGiaoTrinhXB= count(bienban_nt_thuky::where('status','<>','Không đạt')->whereNotNull('status')->get());

        $dkbsList = dang_ki_bien_soan::whereNotNull('statusNT')->whereNotNull('fileQD')->get();


        return view('admin.dashboard',compact('allUser','allHocPhan','allGiaoTrinhXB','allDKBS','dkbsList'));
    }


    public function handleLogin(Request $request){
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5',
            ],
            [
                'email.required' => 'Email không được để trống  !',
                'email.email' => 'Email không đung dinh dang !',

                'password.required' => 'Password không được để trống !',
                'password.min' => 'Password phai lon hon 5 ki tu !',

            ]
        );

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return  redirect()->route('login')->with('msg', 'Thông tin k hợp lệ!');
        }

        $user = Auth::user();

        // dd($user->roles->count() > 0);
        if($user->group_id == 1 ||   $user->roles->count() >0){
            return  redirect()->route('manage.manager');

        }

        return  redirect()->route('client');

    }


    public function logout (){
        Auth::logout();
        return redirect()->route('login');
    }

}
