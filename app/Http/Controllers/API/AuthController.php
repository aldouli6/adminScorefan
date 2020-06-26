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
        $validator = Validator::make($request->all(), array(
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ));
 
        if ($validator->fails()) {
            $messages = $validator->messages();
            $result='';
            $cuenta=0;
            foreach ($messages->all() as $message){
                $result.=$message.',';
                $cuenta++;
            }
            return response(['error'=>'1', 'message'=>$result , 'cuenta'=>$cuenta]);
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $user->sendEmailVerificationNotification();
            return response([ 'user' => $user]);
        }
        
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['error'=>'1',
            'message' => 'Credenciales Inválidas']);
        } 
        $user =auth()->user();
        if($user->email_verified_at==''){
            return response(['error'=>'2',
            'message' => 'Usuario no verificado']);
        }
        if($user->user_type!='user'){
            return response(['error'=>'3',
            'message' => 'Usuario sin permisos para esta aplicación']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['error'=>'0','user' => $user, 'access_token' => $accessToken]);

    }
    public function logout()
    {        
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
        return response(['message' => 'Successfully logged out']);
    }
}