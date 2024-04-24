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
        $owners = Proprietaire::leftJoin('users','proprietaires.user_id','=','users.id')->get() ;
        return response()->json([
            'owners' => $owners,
        ],200) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function posts($id)
    {
        $user = User::findOrFail($id) ;
        $posts = $user->posts ;
        return response()->json([
            'posts' => $posts,
        ],200) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Proprietaire::create([
                'user_id' => $request->user_id ,
            ]) ;
            return response()->json([
                'message' => 'Proprietaire successfully created'
            ],200) ;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Really went wrong'
            ],500) ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($proprietaire)
    {
        $owner = Proprietaire::findOrFail($proprietaire) ;
        return response()->json([
            'owner' => $owner->user,
        ],200) ;
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
        return response()->json([
            'message' => 'Proprietaire successfully deleted'
        ],200) ;
    }
}
