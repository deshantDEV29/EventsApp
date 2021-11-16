<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function getSessions(Request $request){

        $response = [
            'sessions' =>Session::where('event_id', $request['id'])->get()
        ];
        
        return response($response, 200);
    }
}
