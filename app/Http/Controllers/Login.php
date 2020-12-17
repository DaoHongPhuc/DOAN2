<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class Login extends Controller
{
    function index(){
        return view('templates.login');
    }
    
    function post(Request $rq){
        if(Auth::attempt(['email' => $rq->email, 'password' => $rq->password])){
           
            $user = User::find(Auth::user()->id);
            $user->isActive = 1;
            $user->save();
            
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('error','Please check the form below for errors');
        }
    }
}
