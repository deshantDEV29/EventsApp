<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function displayActiveUsers(){

        $request =  DB::table('personal_access_tokens')->get('tokenable_id');
        $response = [
            'personal_access_tokens' => User::whereIn('id', $request['tokenable_id'])->first()
        ];
        return response($request, 200);
     }

     public function displayAllUsers(){
        $response = [
            'users' => User::all('id','name') 
        ];
        return response($response, 200);
     }


}
