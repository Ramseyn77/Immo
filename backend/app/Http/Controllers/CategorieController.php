<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all() ;
        return response()->json([
            'categories' => $categories,
        ],200) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function posts($category)
    {
        $categorie = Categorie::findOrFail($category) ;
        $posts = $categorie->posts ;
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
            'name' => 'required|unique:categories'
        ]) ;

        try {
            $categorie = Categorie::create($request->all()) ;
            return response()->json([
                'message' => "Categorie successfully created"
            ],200) ;
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something really went wrong"
            ],500) ;
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        $categorie = Categorie::findOrFail($category) ;
        if(!$categorie){
            return response()->json([
                'error' => 'Ressource Not found'
            ],404) ;
        }

        return response()->json([
            'categorie' => $categorie
        ],200) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'name' => 'required'
        ]) ;
        try {
            $categorie = Categorie::findOrFail($category) ;
            $categorie->update($request->all()) ;
            return response()->json([
                'message' => "Categorie successfully updated"
            ],200) ;
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something really went wrong"
            ],500) ;
        }
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        $categorie = Categorie::findOrFail($category) ;
        $categorie->delete() ;
        return response()->json([
            'message' => "Categorie successfully deleted"
        ],200) ;
    }
}
