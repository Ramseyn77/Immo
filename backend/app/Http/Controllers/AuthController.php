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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]) ;
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['token' => $token], 200);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
       // Auth::logout() ;
       $request->user()->token()->revoke();
       return response()->json(['message' => 'Successfully logged out']);
    }


    public function connectedUser()
    {
       $user = Auth::user() ;
       return response()->json([
        'user' => $user
    ]) ;
    }

}
