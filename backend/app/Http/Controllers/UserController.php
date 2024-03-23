<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all() ;
        dd($users) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function consultations($user)
    {
        $usr = User::findOrFail($user) ;
        $posts = $usr->consultations ;
        dd($posts) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $usr = User::findOrFail($user) ;
        dd($usr) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $usr = User::findOrFail($user) ;
        $usr->delete() ;
        dd($usr);
    }
}
