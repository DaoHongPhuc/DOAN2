<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Register extends Controller
{
    function index(){
        return view('templates.register');
    }
    
    function post(Request $rq){
        $validatedData = $rq->validate([
            'username' => 'required|alpha|min:6',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
        ]);

        $newuser = new User;
        $newuser->name = $rq->username;
        $newuser->password = bcrypt($rq->password);
        $newuser->email = $rq->email;
        if($newuser->save()){
            return redirect()->back()->with('success','Registered account successful');
        }else{
            return redirect()->back()->with('error','Please check the form below for errors');
        }


    }
}
