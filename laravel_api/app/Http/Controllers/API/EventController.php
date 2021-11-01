<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;

class EventController extends Controller
{
    public function displayEvents(){
        $response = [
            'events' => Events::all('title','event_schedule') 
        ];
        return response($response, 200);
     }

    public function displayDetails(Request $request){

        $data = $request->validate([
            
            'title' => 'required|string',
        ]);
        $response = [
            Events::where('title', $data['title'])->first()
        ];
        
        return response($response, 200);
    }
}
