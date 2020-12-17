<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Contact;
use App\Chat;
class chatController extends Controller
{
    function __construct()
    {
        if(Auth::check()){
            return redirect()->back();
        }
    }

    function sendmessage(Request $rq){
        $chat = new Chat;
        $chat->from_id = Auth::user()->id;
        $chat->to_id = $rq->contactid;
        $chat->content = $rq->contentmessage;

        if($chat->save()){
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }

    function getcontact(Request $rq){
        $contactrecent = DB::table('contacts')
        ->where('user_id',Auth::user()->id)
        ->orwhere('contact_id',Auth::user()->id)
        ->where('isDelete',0)
        ->get();
        $listcontact = "";

        foreach ($contactrecent as $k => $v) {
            if($v->user_id == $rq->selectContact || $v->contact_id == $rq->selectContact){
                if($v->contact_id == Auth::user()->id && $v->user_id == Auth::user()->id){
                    $listcontact .= '<div class="chat_list active_chat" data-contactid="'.$v->contact_id.'" >
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        Me <span class="chat_date">'.substr($v->created_at,0,10).' <i class="far fa-trash-alt" onClick="deleteContact('.$v->id.')" title="Delete"></i></span>
                                    </h5>
                                    <p>New message recent</p>
                                </div>
                            </div>
                        </div>';
                }else if($v->contact_id != Auth::user()->id){
                    if(\App\User::find($v->contact_id)->isActive == 1){
                        $checkActive = "Online";
                    }else{
                        $checkActive = "Offline";
                    }
                    $listcontact .= '<div class="chat_list active_chat" data-contactid="'.$v->contact_id.'" >
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        
                                        '.
                                        \App\User::find($v->contact_id)->firstname .' '.
                                        \App\User::find($v->contact_id)->middlename .' '.
                                        \App\User::find($v->contact_id)->lastname .' '
                                        .' 
                                        <span class="chat_date">'.substr($v->created_at,0,10).' <i class="far fa-trash-alt" onClick="deleteContact('.$v->id.')" title="Delete"></i></span>
                                    </h5>
                                    <p>'.$checkActive.'</p>
                                </div>
                            </div>
                        </div>';
                }else{
                    if(\App\User::find($v->user_id)->isActive == 1){
                        $checkActive = "Online";
                    }else{
                        $checkActive = "Offline";
                    }
                    $listcontact .= '<div class="chat_list active_chat" data-contactid="'.$v->user_id.'" >
                            <div class="chat_people">
                                <div class="chat_img"> <img src="'.asset('documents/imageUser').'/default.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        '.
                                        \App\User::find($v->user_id)->firstname .' '.
                                        \App\User::find($v->user_id)->middlename .' '.
                                        \App\User::find($v->user_id)->lastname .' '
                                        .' 
                                        <span class="chat_date">'.substr($v->created_at,0,10).' <i class="far fa-trash-alt" onClick="deleteContact('.$v->id.')" title="Delete"></i></span>
                                    </h5>
                                    
                                    <p>'.$checkActive.'</p>
                                </div>
                            </div>
                        </div>';
                }
            }else{
                if($v->contact_id == Auth::user()->id && $v->user_id == Auth::user()->id){
                    $listcontact .= '<div class="chat_list " data-contactid="'.$v->contact_id.'" >
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        Me <span class="chat_date">'.substr($v->created_at,0,10).' <i class="far fa-trash-alt" onClick="deleteContact('.$v->id.')" title="Delete"></i></span>
                                    </h5>
                                    <p>New message recent</p>
                                </div>
                            </div>
                        </div>';
                }else if($v->contact_id != Auth::user()->id){
                    if(\App\User::find($v->contact_id)->isActive == 1){
                        $checkActive = "Online";
                    }else{
                        $checkActive = "Offline";
                    }
                    $listcontact .= '<div class="chat_list " data-contactid="'.$v->contact_id.'" >
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        
                                        '.
                                        \App\User::find($v->contact_id)->firstname .' '.
                                        \App\User::find($v->contact_id)->middlename .' '.
                                        \App\User::find($v->contact_id)->lastname .' '
                                        .' 
                                        <span class="chat_date">'.substr($v->created_at,0,10).' <i class="far fa-trash-alt" onClick="deleteContact('.$v->id.')" title="Delete"></i></span>
                                    </h5>
                                    <p>'.$checkActive.'</p>
                                </div>
                            </div>
                        </div>';
                }else{
                    if(\App\User::find($v->user_id)->isActive == 1){
                        $checkActive = "Online";
                    }else{
                        $checkActive = "Offline";
                    }
                    $listcontact .= '<div class="chat_list " data-contactid="'.$v->user_id.'" >
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>
                                        
                                        '.
                                        \App\User::find($v->user_id)->firstname .' '.
                                        \App\User::find($v->user_id)->middlename .' '.
                                        \App\User::find($v->user_id)->lastname .' '
                                        .' 
                                        <span class="chat_date">'.substr($v->created_at,0,10).' <i class="far fa-trash-alt" onClick="deleteContact('.$v->id.')" title="Delete"></i></span>
                                    </h5>
                                    <p>'.$checkActive.'</p>
                                </div>
                            </div>
                        </div>';
                }
            }
        }
        return response()->json([
            'status' => true,
            'listcontact' => $listcontact
        ]);
    }

    function getmessage(Request $rq){
        $chathistory = DB::table('chats')
        ->where('from_id',Auth::user()->id)
        ->orWhere('to_id',Auth::user()->id)
        ->where('isDelete',0)
        ->get();
        foreach ($chathistory as $k => $v) {
            if($v->isDelete == 0){
                continue;
            }else{
                unset($chathistory[$k]);
            }
        }
        foreach ($chathistory as $k => $v) {
            if($v->from_id == Auth::user()->id && $v->to_id == $rq->id || $v->to_id == Auth::user()->id && $v->from_id == $rq->id){
                continue;
            }else{
                unset($chathistory[$k]);
            }
        }
        return response()->json([
            'status' => true,
            'chathistory' => $chathistory
        ]);
    }
    
    function index(){
        $contactrecent = DB::table('contacts')
        ->where('isDelete',0)
        ->where('user_id',Auth::user()->id)
        ->orderBy('created_at','desc')   
        ->get();

        return view('templates.site.pages.chat',compact('contactrecent'));
    }

    function deleteMessage(Request $rq){
        $chat = Chat::find($rq->idMessage);
        $chat->isDelete = 1;
        if($chat->save()){
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }
    
    function deleteContact(Request $rq){
        $contact = Contact::find($rq->idContact);
        $contact->isDelete = 1;
        if($contact->save()){
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
