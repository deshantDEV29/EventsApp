<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function displayActiveUsers(){

        $request =  DB::table('personal_access_tokens')
                        ->join('users', 'personal_access_tokens.tokenable_id','=', 'users.id')
                        ->select('personal_access_tokens.tokenable_id', 'users.name')
                        ->get();
        
        $response = [
            'personal_access_tokens' =>  $request
            
            
        ];
        return response($response, 200);
     }

     public function displayAllUsers(){
        $response = [
            'users' => User::all('id','name') 
        ];
        return response($response, 200);
     }


}
