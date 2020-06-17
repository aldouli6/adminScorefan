<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
 
        if ($validator->fails()) {
            return response($validator->messages());
        }else{
            $user = User::create($request->all());
            $accessToken = $user->createToken('authToken')->accessToken;
            return response([ 'user' => $user, 'access_token' => $accessToken]);
        }
        
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }
    public function logout()
    {        
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
        return response(['message' => 'Successfully logged out']);
    }
}