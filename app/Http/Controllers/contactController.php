<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Contact;
class contactController extends Controller
{
    function checkContact(Request $rq){
        
        $check = DB::table('contacts')
        ->where('user_id',Auth::user()->id)
        ->where('contact_id',$rq->contactid)
        ->get();

        // true la not empty
        if(count($check) > 0)
        {
            return response()->json([
                'status' => true,
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
            ]);
        }

    }
    function addContact(Request $rq){
        $contact = new Contact;

        $contact->user_id = Auth::user()->id;
        $contact->contact_id = $rq->data;

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
