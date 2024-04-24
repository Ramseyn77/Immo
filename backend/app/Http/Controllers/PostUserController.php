<?php

namespace App\Http\Controllers;

use App\Models\PostUser;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = PostUser::all() ;
        return response()->json([
            'consultations' => $consultations,
        ],200) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            PostUser::create([
                'user_id' => $request->user_id,
                'post_id'=> $request->post_id,
            ]) ;
            return response()->json([
                'message' => 'Ressource was successffully created'
            ],201) ;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Really Went Wrong'
            ],500) ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($consultation)
    {
        $consult = PostUser::findOrFail($consultation) ;
        return response()->json([
            'consult' => $consult,
        ],200) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $consultation)
    {
        try {
            $consult = PostUser::findOrFail($consultation) ;
            $consult->update([
                'user_id' => $request->user_id,
                'post_id'=> $request->post_id,
            ]) ;
            return response()->json([
                'message' => 'Ressource was successffully updated'
            ],201) ;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something Really Went Wrong'
            ],500) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($consultation)
    {
        $consult = PostUser::findOrFail($consultation) ;
        $consult->delete() ;
        dd($consult) ;
    }
}
