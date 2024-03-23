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
        dd($categories) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function posts($category)
    {
        $categorie = Categorie::findOrFail($category) ;
        $posts = $categorie->posts ;
       dd($posts) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]) ;
        $categorie = Categorie::create($request->all()) ;
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        $categorie = Categorie::findOrFail($category) ;
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
        $categorie = Categorie::findOrFail($category) ;
        $categorie->update($request->all()) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        $categorie = Categorie::findOrFail($category) ;
        $categorie->delete() ;
    }
}
