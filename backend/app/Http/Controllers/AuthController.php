<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]) ;
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json([
                'token' => $token,
                'user' => $user
            ], 200);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
       $request->user()->token()->revoke();
       return response()->json(['message' => 'Successfully logged out']);
    }


    private function code(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        $length = strlen($characters);
        for ($i = 0; $i < 6; $i++) {
            $code .= $characters[rand(0, $length - 1)];
        }
        return $code;
    }

}
