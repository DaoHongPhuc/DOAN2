<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Categories;

class Category extends Controller
{
    function __construct()
    {
        
    }

    function index(){
        if(Auth::user()->level != 1){
            return redirect()->back();
        }
        return view('templates.dashboard.category.list');
    }

    function listcategories(){
        $listcategories = DB::table('categories')->where('isDelete',0)->get();
        $count = 1;
        $rs = array();
        foreach ($listcategories as $k => $v) {
            $tmp["id"] = $v->id;
            $tmp["count"] = $count++;
            $tmp["name"] = $v->name;
            $tmp["description"] = $v->description;
            $tmp["isDelete"] = $v->isDelete;
            $tmp["creator"] = $v->creator;
            $tmp["created_at"] = $v->created_at;
            $rs[] = $tmp;
        }

        return response()->json([
            'result' => $rs,
        ]);
    }

    function deleteCategories(Request $rq){
        $categories = Categories::find($rq->data);
        $categories->isDelete = "1";
        if($categories->save()){
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }

    function addCategory(Request $rq){
        $categories = new Categories;
        $data = json_decode($rq->data, true);

        $categories->name = $data["Name"];
        $categories->description = $data["Description"];

        $categories->slug =  Str::slug($data["Name"]);

        $categories->creator = Auth::user()->name;

        if($categories->save()){
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }

    }

    function listuser(){
        $listuser = DB::table('users')->get();
        $count = 1;
        $rs = array();
        foreach ($listuser as $k => $v) {
            $tmp["count"] = $count++;
            $tmp["name"] = $v->name;
            $tmp["email"] = $v->email;
            $tmp["level"] = $v->level;
            $rs[] = $tmp;
        }
        return response()->json([
            'result' => $rs,
        ]);
    }
}
