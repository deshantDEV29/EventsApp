<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function getQuestions(Request $request){

        $response = [
            'questions' =>Questions::where('quiz_id', $request['id'])->get()
        ];
        
        return response($response, 200);
    }

    public function getQuiz(){
        $response = [
            'quizzes' => Quiz::all('id','name') 
        ];
        return response($response, 200);
     }


}
