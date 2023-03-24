<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(){
        return view('layout.login');
    }
    public function show_dashboard(){
        return view('layout.admin');
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
        if($user->group_id == 1){
            return  redirect()->route('manager');

        }

        return  redirect()->route('client');



    }


    public function logout (){
        Auth::logout();

        return redirect()->route('login');
    }

}
