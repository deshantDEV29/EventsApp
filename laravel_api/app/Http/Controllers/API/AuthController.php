<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users,email',
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' =>$data['name'],
            'email' =>$data['email'],
            'phone' =>$data['phone'],
            'password' =>Hash::make($data['password']),
        ]);


       
        
        $token = $user->createToken('fundaProjectToken')->plainTextToken;
       
        $response = [
            'user'=> $user,
            'token'=>$token, 
      
            
        ];

        return response( $response, 201);
    }

    public function logout(Request $request){
       auth()->user()->tokens()->delete();
        return [
            'message'=>'Logged out Successfully',
            'success'=>true];
    }


    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();
        $username = User::where('email', $data['email'])->first('name');
        $email = User::where('email', $data['email'])->first('email');

        if(!$user || !Hash::check($data['password'],$user->password)){
            return response(['message'=>'Invalid Credentials'],401);
        }
        else{
            $token = $user->createToken('fundaProjectTokenLogin')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
                'username' => $username,
                'email' => $email
            ];

            return response($response, 200);
        }
    }
}
