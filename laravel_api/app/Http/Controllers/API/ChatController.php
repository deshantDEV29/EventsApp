<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
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

     public function sendmessage(Request $request){
        $data = $request->validate([
            
            'reciever_id' => 'int',
            'message' => 'required|string',
        ]);

        $user = Message::create([
            'sender_id' =>auth()->user()->id,
            'reciever_id' =>$data['reciever_id'],
            'message' =>$data['message'],
            
        ]);
       
        $response = [
            'message'=> 'Message delivered',
        ];

        return response( $response, 200);
    }

    public function getMessage(Request $request){
        $data = $request->validate([
            'userid_2' => 'int',
        ]);

        $response =   Message::where('sender_id',auth()->user()->id) 
                            ->where('reciever_id',$data['userid_2']) 
                            ->orWhere('sender_id',$data['userid_2'])                 
                            ->Where('reciever_id',auth()->user()->id)
                            ->orderBy('updated_at', 'asc')
                            ->get();

        return response( $response, 200);
    }

    public function getConversation(){

        $conversations =   Message::where('sender_id',auth()->user()->id)                       
                            ->orWhere('reciever_id',auth()->user()->id)
                            ->orderBy('updated_at', 'desc')
                            ->get();
		$count = count($conversations);
		$array = [];
		for ($i = 0; $i < $count; $i++) {

                    if ($conversations[$i]->{'sender_id'} != auth()->user()->id) {
                       array_push($array,($conversations[$i]->{'sender_id'}));
                    }
                    elseif ($conversations[$i]->{'reciever_id'} != auth()->user()->id) {
                        array_push($array,($conversations[$i]->{'reciever_id'}));
                    }
                };
    

        $unique = array_unique($array);

        $array2=[];

        $users = DB::table('users')
                    ->whereIn('id', $unique)
                    ->select('id', 'name')
                    ->get() ;

        $response = [
            'reciepients' =>  $users                                                
                    ];
       
        return response( $response, 200);
        }
    }