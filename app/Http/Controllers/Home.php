<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Posts;
use App\Level;
use App\User;
use App\Contact;
use App\Document;

class Home extends Controller
{
    function __construct(){

    }

    function homedocument(){
        $easy = DB::table('document')
        ->where('isDelete',0)
        ->where('level_id',4)
        ->get();

        $medium = DB::table('document')
        ->where('isDelete',0)
        ->where('level_id',5)
        ->get();

        $hard = DB::table('document')
        ->where('isDelete',0)
        ->where('level_id',6)
        ->get();
        
        return view('templates.site.pages.document',compact('easy','medium','hard'));
    }

    function detailDocument($slug){
        $check = DB::table('document')
        ->where('isDelete',0)
        ->where('slug',$slug)
        ->get();

        if(!empty($check)){
            $data = Document::where('slug',$slug)->get();

            // id author
            $idauthor = DB::table('document')->select('user_id')->where('slug',$slug)->get();
            $jsonidauthor = json_decode($idauthor);


            $morefromauthor = DB::table('document')
            ->where('user_id',$jsonidauthor["0"]->user_id)
            ->where('isDelete',0)
            ->take(5)
            ->get();
            return view('templates.site.pages.detaildocument',compact('data','morefromauthor'));
        }else{
            return redirect()->back()->with('error','Error !');
        }
    }

    function index(){
        $newpost = DB::table('post')
        ->where('isDelete',0)
        // ->where('status',1)
        ->limit(6)
        ->get();

        $newdocument = DB::table('document')
        ->where('isDelete',0)
        // ->where('status',1)
        ->limit(12)
        ->get();

        $hotpost = DB::table('post')
        ->where('isDelete',0)
        ->where('status',1)
        ->orderBy('view', 'desc')
        ->limit(5)
        ->get();

        $categories = DB::table('categories')
        ->where('isDelete',0)
        ->get();

        $level = DB::table('level')
        ->where('isDelete',0)
        ->get();
        

        return view('templates.site.pages.home',compact(
            'newpost','categories','hotpost','level','newdocument'
        ));
    }

    function detailPost($slug){
        $check = DB::table('post')
        ->where('isDelete',0)
        ->where('status',1)
        ->where('slug',$slug)
        ->get();
        if(!empty($check)){
            $data = Posts::where('slug',$slug)->get();

            // id author
            $idauthor = DB::table('post')->select('user_id')->where('slug',$slug)->get();
            $jsonidauthor = json_decode($idauthor);


            $morefromauthor = DB::table('post')
            ->where('user_id',$jsonidauthor["0"]->user_id)
            ->where('isDelete',0)
            ->where('status',1)
            ->get();
            return view('templates.site.pages.detailpost',compact('data','morefromauthor'));
        }else{
            return redirect()->back()->with('error','Error !');
        }
    }

}
