<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    function __construct()
    {
        if(Auth::check()){
            return redirect('login');
        }
    }
    
    function index(){
        return view('templates.dashboard.index');
    }
    
}
