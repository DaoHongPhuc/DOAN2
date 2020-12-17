<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Categories;
use App\Posts;

class Post extends Controller
{
    function __construct()
    {
    }

    function newpost(){
        return view('templates.dashboard.post.addnew');
    }

    function listwaitingpost(){
        return view('templates.dashboard.post.listwaiting');
    }

    function listallpost(){
        return view('templates.dashboard.post.listall');
    }

    function mylistpost(){
        if(Auth::user()->level == 1){
            $listmypost = DB::table('post')
            ->where('isDelete',0)
            ->get();
        }else{

            $listmypost = DB::table('post')
            ->where('user_id', Auth::user()->id)
            ->where('isDelete',0)
            ->get();
        }

        $count = 1;
        $rs = array();

        foreach ($listmypost as $k => $v) {
            $tmp["id"] = $v->id;
            $tmp["count"] = $count++;
            $tmp["user_id"] = $v->user_id;
            $tmp["categories"] = Categories::find($v->categories_id)->name;

            $tmp["title"] = $v->title;
            $tmp["slug"] = $v->slug;
            $tmp["content"] = $v->content;
            $tmp["view"] = $v->view;

            $tmp["isDelete"] = $v->isDelete;
            $tmp["status"] = $v->status;
            
            $tmp["image"] = $v->image;
            $tmp["updated_at"] = $v->updated_at;
            $tmp["created_at"] = $v->created_at;
            $rs[] = $tmp;

        }

        return response()->json([
            'result' => $rs,
        ]);
    }

    function deletePost(Request $rq){
        $post = Posts::find($rq->data);
        $post->isDelete = "1";
        if($post->save()){
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }

    function addnewpost(Request $rq){
        $post = new Posts;
        $post->user_id = Auth::user()->id;
        $post->categories_id = $rq->categoriesPost;

        $post->abstract = $rq->abstractPost;
        
        $post->title = $rq->titlePost;
        $post->slug = Str::slug($rq->titlePost) . '-' . Str ::random();
        $post->content = $rq->contentPost;

        $imageName = time().'.'.$rq->imagePost->extension();  
        $post->image = $imageName;
        $rq->imagePost->move(base_path('public\documents\imagePost'), $imageName);

        if($post->save()){
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
