<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Categories;
use App\User;
use App\Document;
class documentController extends Controller
{
    function index(){
       
        return view('templates.dashboard.document.list');
    }

    function newdocument(){
        return view('templates.dashboard.document.addnew');
    }

    function postnewdocument(Request $rq){
        $document = new Document;
        $document->user_id = Auth::user()->id;
        $document->category_id = $rq->categoriesDocument;

        $document->level_id = $rq->levelDocument;
        
        $document->name = $rq->nameDocument;
        $document->slug = Str::slug($rq->nameDocument) . '-' . Str ::random();

            $fileDocument = time().'.'.$rq->fileDocument->extension();  
            $rq->fileDocument->move(base_path('public\documents\document'), $fileDocument);
        $document->file = $fileDocument;

        $document->content = $rq->contentDocument;

        if($document->save()){
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }

    function listdocument(){
        $listdocument = DB::table('document')->where('isDelete',0)->get();
        $count = 1;
        $rs = array();
        foreach ($listdocument as $k => $v) {
            $tmp["id"] = $v->id;
            $tmp["count"] = $count++;
            $tmp["owner"] = User::find($v->user_id)->name;
            $tmp["category"] = Categories::find($v->category_id)->name;
            $tmp["name"] = $v->name;
            $tmp["file"] = $v->file;
            $tmp["content"] = $v->content;
            $tmp["isDelete"] = $v->isDelete;
            $tmp["created_at"] = $v->created_at;
            $rs[] = $tmp;
        }

        return response()->json([
            'result' => $rs,
        ]);
    }
}
