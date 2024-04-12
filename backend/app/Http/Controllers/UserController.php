<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $companies = User::where('status',2) ;
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
                'nom' => 'required',
                'prenom' => 'required' ,
                'email' => 'required|email|unique:users' ,
                'password' => 'required|min:8' ,
                'cpassword' => 'required|min:8' ,
                'age' => 'required',
                'telephone' => 'required' ,
                'adresse' => 'required',
                'profil' => 'required' ,
            ]) ;
            if($request->password == $request->cpassword ){
                $fileName = time().".".$request->profil->getClientOriginalExtension() ;
                $request->profil->move('profils/', $fileName);

                $user = User::create([
                    'nom' => $request->nom, 'prenom' => $request->prenom, 'email' => $request->email,
                    'password' => Hash::make($request->password), 'age' => $request->age , 'telephone' => $request->telephone ,
                    'adresse' => $request->adresse ,'profil' => $request->profil
                ]) ;
                return response()->json([
                    'message' => 'User successfully created' ,
                ]) ;
                return response()->json([
                    'message' => 'Password doesn\' match' ,
                ]) ;
            }
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong' ,
            ]) ;
       }
    }

    public function companyStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users' ,
                'password' => 'required|min:8' ,
                'cpassword' => 'required|min:8' ,
                'telephone' => 'required' ,
                'adresse' => 'required',
                'profil' => 'required' ,
                'status' => 2
            ]) ;
            if($request->password == $request->cpassword ){
                $fileName = time().".".$request->profil->getClientOriginalExtension() ;
                $request->profil->move('profils/', $fileName);
    
                $user = User::create([
                    'name' => $request->name, 'email' => $request->email,
                    'password' => Hash::make($request->password), 'telephone' => $request->telephone ,
                    'adresse' => $request->adresse ,'profil' => $request->profil
                ]) ;
                return response()->json([
                    'message' => 'User successfully created' ,
                ]) ;
                return response()->json([
                    'message' => 'Password doesn\' match' ,
                ]) ;
            }
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong' ,
            ]) ;
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
            $usr = User::findOrFail($user) ;
            $usr->update([
                'name' => $request->name, 'email' => $request->email,
                'password' => Hash::make($request->password), 'telephone' => $request->telephone ,
                'adresse' => $request->adresse 
            ]);
            return response()->json([
                'message' => 'Company sucessfully updated'
            ]) ;
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Somethiong Went Wrong'
            ]) ;
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
       try {
            $usr = User::findOrFail($user) ;
            $usr->update([
                'nom' => $request->nom, 'prenom' => $request->prenom, 'email' => $request->email,
                'password' => Hash::make($request->password), 'age' => $request->age , 'telephone' => $request->telephone ,
                'adresse' => $request->adresse 
            ]) ;
            return response()->json([
                'message' => 'Company sucessfully updated'
            ]) ;
       } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong'
            ]) ;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
       try {
            $usr = User::findOrFail($user) ;
            $usr->delete() ;
            return response()->json([
                'message' => 'Company sucessfully deleted'
            ]) ;
       } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something Wnt Wrong'
        ]) ;
       }
    }
}
