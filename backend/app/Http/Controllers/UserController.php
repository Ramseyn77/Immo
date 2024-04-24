<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all() ;
        return response()->json([
            'users' => $users
        ]) ;
    }

    public function companies(){
        $companies = User::where('status',2)->get() ;
        return response()->json([
            'companies' => $companies
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function consultations($user)
    {
        $usr = User::findOrFail($user) ;
        $posts = $usr->consultations ;
        return response()->json([
            'posts' => $posts
        ]) ;
    }

    
    public function store(Request $request)
    {
       try {
            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string' ,
                'email' => 'required|email|unique:users' ,
                'password' => 'required|min:6|string' ,
                'cpassword' => 'required|min:6|string' ,
                'age' => 'required|string',
                'telephone' => 'required|string' ,
                'adresse' => 'required|string',
                'profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg' ,
            ]) ;
            if($request->password == $request->cpassword ){
                if($request->hasFile('profil')){
                    $image = time().".".$request->profil->getClientOriginalExtension() ;
                    $fileName = $request->file('profil')->storeAs('avatars', $image) ;
                    User::create([
                    'nom' => $request->nom, 'prenom' => $request->prenom, 'email' => $request->email,
                    'password' => Hash::make($request->password), 'age' => $request->age , 'telephone' => $request->telephone ,
                    'adresse' => $request->adresse ,'profil' => $fileName
                    ]) ;
                    return response()->json([
                        'message' => 'User successfully created' ,
                    ]) ;
                }             
            }else{
                return response()->json([
                    'message' => 'Password doesn\' match' ,
                ],201) ;
            }
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong' ,
            ],500) ;
       }
    }

    public function companyStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users' ,
                'password' => 'required|min:6|string' ,
                'cpassword' => 'required|min:6|string' ,
                'telephone' => 'required|string' ,
                'adresse' => 'required|string',
                'profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg' ,
            ]) ;
            if($request->password == $request->cpassword ){
                if($request->hasFile('profil')){
                    $image = time().".".$request->profil->getClientOriginalExtension() ;
                    $fileName = $request->file('profil')->storeAs('avatars', $image) ;
                    User::create([
                        'name' => $request->name, 'email' => $request->email,
                        'password' => Hash::make($request->password), 'telephone' => $request->telephone ,
                        'adresse' => $request->adresse ,'profil' => $fileName, 'status' => 2
                    ]) ;
                    return response()->json([
                        'message' => 'User successfully created' ,
                    ],201) ;
                }
            }else{              
                return response()->json([
                    'message' => 'Password doesn\' match' ,
                ]) ;
            }
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong' ,
            ],500) ;
       }
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
       try {
            $usr = User::findOrFail($user) ;
            return response()->json([
                'user' => $usr
            ]);
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'User not found'
            ]) ;
       }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateCompany(Request $request, $user)
    {
       try{    
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email' ,
                'telephone' => 'required|string' ,
                'adresse' => 'required|string',
                'profil' => 'image|mimes:jpeg,png,jpg,gif,svg' ,
            ]) ;     
            $usr = User::findOrFail($user) ;
            $usr->update([
                'name' => $request->name, 'email' => $request->email,
                'telephone' => $request->telephone ,
                'adresse' => $request->adresse ,
            ]);

            if($request->hasFile('profil')){
                Storage::delete($usr->profil) ;
                $image = time().".".$request->profil->getClientOriginalExtension() ;
                $fileName = $request->file('profil')->storeAs('avatars', $image) ;
                $usr->update([
                    'profil' => $fileName, 
                ]) ;
            }         
            return response()->json([
                'message' => 'Company sucessfully updated'
            ],201) ;
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Somethiong Went Wrong'
            ],500) ;
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
       try {
            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string' ,
                'email' => 'required|email' ,
                'age' => 'required|string',
                'telephone' => 'required|string' ,
                'adresse' => 'required|string',
                'profil' => 'image|mimes:jpeg,png,jpg,gif,svg' ,
            ]) ;
            $usr = User::findOrFail($user) ;
            $usr->update([
                'nom' => $request->nom, 'prenom' => $request->prenom, 'email' => $request->email,
                'age' => $request->age , 'telephone' => $request->telephone ,
                'adresse' => $request->adresse , 'profession' => $request->profession,
                'numero_IFU' => $request->numero_IFU
            ]);
            if($request->hasFile('profil')){
                Storage::delete($usr->profil) ;
                $image = time().".".$request->profil->getClientOriginalExtension() ;
                $fileName = $request->file('profil')->storeAs('avatars', $image) ;
                $usr->update([
                    'profil' =>$fileName
                ]);
            }         
            return response()->json([
                'message' => 'Company sucessfully updated'
            ],201) ;
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong'
            ],500) ;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
       try {
            $usr = User::findOrFail($user) ;
            Storage::delete($usr->profil) ;
            $usr->delete() ;
            return response()->json([
                'message' => 'Company sucessfully deleted'
            ],201) ;
       } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something Went Wrong'
        ],500) ;
       }
    }
}
