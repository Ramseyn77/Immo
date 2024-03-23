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
        dd($types) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function posts($type)
    {
        $typ = Type::findOrFail($type) ;
        $posts = $typ->posts ;
        dd($posts) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:types'
        ]) ;
        $type = Type::create($request->all()) ;
    }

    /**
     * Display the specified resource.
     */
    public function show($type)
    {
        $typ = Type::findOrFail($type) ;
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
        $typ = Type::findOrFail($type) ;
        $typ->update($request->all()) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type)
    {
        $typ = Type::findOrFail($type) ;
        $typ->delete() ;
    }
}
