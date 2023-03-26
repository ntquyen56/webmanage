<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    //

    public function createAccountUser(){
        try{

            //pass = radom
            //ádasdas

            //save




            // Mail::to($user->email)->send( new SendMailForgotPassword($user,$mailData));

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
