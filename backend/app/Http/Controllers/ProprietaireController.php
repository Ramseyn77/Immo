<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use App\Models\User;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proprietaires = Proprietaire::all() ;
        dd($proprietaires) ;
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function posts($id)
    {
        $user = User::findOrFail($id) ;
        $posts = $user->posts ;
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
    public function show($proprietaire)
    {
        $owner = Proprietaire::findOrFail($proprietaire) ;
        dd($owner->user) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($proprietaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $proprietaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($proprietaire)
    {
        $owner = Proprietaire::findOrFail($proprietaire) ;
        $owner->delete() ;
        dd($owner) ;
    }
}
