<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use TypeError;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all() ;
        return response()->json([
            'types' => $types,
        ],200) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function posts($type)
    {
        $typ = Type::findOrFail($type) ;
        $posts = $typ->posts ;
        return response()->json([
            'posts' => $posts,
        ],200) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:types'
        ]) ;
       
        try {
            $type = Type::create($request->all()) ;
            return response()->json([
                'message' => 'Type successfully created'
            ],200) ;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something really went wrong'
            ],500) ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($type)
    {
        $typ = Type::findOrFail($type) ;
        if(!$typ){
            return response()->json([
                'error' => 'Ressource Not found'
            ],404) ;
        }

        return response()->json([
            'type' => $typ
        ],200) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type)
    {
        $request->validate([
            'name' => 'required'
        ]) ;
       try {
            $typ = Type::findOrFail($type) ;
            $typ->update($request->all()) ;
            return response()->json([
                'message' => 'Type successfully updated'
            ],200) ;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something really went wrong'
            ],500) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type)
    {
        $typ = Type::findOrFail($type) ;
        $typ->delete() ;
        return response()->json([
            'message' => 'Type successfully deleted'
        ],200) ;
    }
}
