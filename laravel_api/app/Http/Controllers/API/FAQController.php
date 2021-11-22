<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    //
    public function displayFAQ(){
        $response = [
            'FAQ' => FAQ::all('question','answer') 
        ];
        return response($response, 200);
     }
}
