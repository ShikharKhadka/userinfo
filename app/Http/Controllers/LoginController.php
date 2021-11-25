<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public $sucessStatus = 200;
    public function register(Request $request)
   {
        $validatedData = $request->validate([
            'name'=>'required|String',
            'email'=>'email|required|unique:users',
            'password'=>'required|String'
        ]);
        $input= $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $sucess['token'] = $user->createToken('MyApp')->accessToken;
            $sucess['name'] = $user->name;
            return response()->json([$sucess],$this->sucessStatus);

    }

    public function login(){
        {
            if(Auth::attempt(['email' => request('email'),'password' => request('password')])) {
                $user = Auth::user();
                $sucess['name'] = $user->name; 
                $sucess['token'] = $user->createToken('MyApp')->accessToken;
                return response()->json([$sucess],$this->sucessStatus);
            }
            else{
                return response()->json(['error'=>'Please enter correct email or password'],401);
            }
    
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
    
            return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    
       }
}
}
