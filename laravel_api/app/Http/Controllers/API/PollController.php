<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function getpolllist(){
        return response()->json([
            'id' => 99,
            'question' => 'What is this',
            'option1' => 'Square',
            'option2' => 'Circle',
        ]);
    }

    public function userVote(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dev";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO larapoll_votes (id, user_id, option_id, created_at, updated_at)
        VALUES (1, 100, 3, 2021-11-14 03:30:42, 2021-11-14 03:30:42)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }  
        
        $conn->close();

        /*$response = Http::post('http://192.168.1.2:3001/api/v1/vote/1',
            [
                'input' => [
                    'option_id' => "1"
                ]
            ]
        );
        return response()->json([
            'id' => 99,
            'question' => 'What is this',
            'option1' => 'Square',
            'option2' => 'Circle',
        ]);*/
    }

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        return view('presenterdash');
    }

    public function poll_index()
    {
        $polls = Poll::all();
        return view('voteselect', ['polls' => $polls]);
    }

    /*public function vote($id)
    {
        $poll = Poll::findOrFail($id);
        return view('vote', ['poll' => $poll]);
    }*/

    public function vote(Poll $poll, Request $request)
    {
        try{

            $vote = $this->resolveVoter($request, $poll)
                ->poll($poll)
                ->vote($request->get('options'));

            if($vote){
                return back()->with('success', 'Vote Done');
            }
        }catch (Exception $e){
            return back()->with('errors', $e->getMessage());
        }
        /*$response = Http::post('http://192.168.1.2:3001/web/v1/admin_polls/vote/polls/1', [
          'input' => [
              'option_id' => "1"
            ],
          ]
        );*/
    }
}

