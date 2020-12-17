<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Level;

class LevelController extends Controller
{
    function __construct()
    {
        
    }
    
    function index(){
        if(Auth::user()->level != 1){
            return redirect()->back();
        }
        return view('templates.dashboard.level.list');
    }

    function addLevel(Request $rq){
        $categories = new Level;
        $data = json_decode($rq->data, true);

        $categories->name = $data["Name"];

        $categories->slug = Str::slug($data["Name"]);
        $categories->description = $data["Description"];
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

    function listlevels(){
        $listlevel = DB::table('level')->where('isDelete',0)->get();
        $count = 1;
        $rs = array();
        foreach ($listlevel as $k => $v) {
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

    function deleteLevel(Request $rq){
        $level = Level::find($rq->data);
        $level->isDelete = "1";
        if($level->save()){
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }

}
