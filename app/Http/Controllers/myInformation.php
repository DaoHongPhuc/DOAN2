<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Contact;
use App\User;

class myInformation extends Controller
{
    function myinformation(){
        return view('templates.dashboard.information.index'); 
    }

    function updatemyinformation(Request $rq){
        $user = User::find(Auth::user()->id);
        $user->firstname = $rq->firstName;
        $user->middlename = $rq->middleName;
        $user->lastname = $rq->lastName;
        $user->name = $rq->userName;
        $user->address = $rq->address;
        $user->phone = $rq->phone;
        $user->workplace = $rq->workPlace;
        $user->birthday = $rq->birthDay;
        $user->describeself = $rq->describeSelf;

        if($user->save()){
            return redirect()->back()->with('success','Sucessfully !');
        }else{
            return redirect()->back()->with('error','Error !');

        }
    }
}
