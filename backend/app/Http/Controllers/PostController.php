<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\PostUser;
use App\Models\Proprietaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $posts = Post::all() ;
        return response()->json([
            'posts' => $posts ,
        ], 200) ;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function owner($id)
    {
       $post = Post::findOrFail($id) ;
       $owner = $post->user ;
       return response()->json([
        'owner' => $owner ,
    ], 200) ;
    }

    public function visitors($id){
        $post = Post::findOrFail($id) ;
        $visitors = $post->users ;
        dd($visitors) ;
        return response()->json([
            'visitors' => $visitors ,
        ], 200) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try {
           $post = Post::create([
                'name' => $request->name, 'surface' => $request->surface ,'nbr_piece' => $request->nbr_piece, 
                'prix' => $request->prix , 'description' => $request->description,
                'departement' => $request->departement, 'ville' => $request->ville ,'quartier' => $request->quartier, 
                'categorie_id' => $request->categorie_id ,'type_id' => $request->type_id, 'user_id' => $request->user_id ,
            ]) ;

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $image) {
                    $fileName = time().".".$image->getClientOriginalExtension() ;
                    $path = $image->storeAs('uploads', $fileName); 
                    Image::create([
                        'name' => $path,
                        'post_id' => $post->id,
                    ]) ;
                    
                }
            }

            $owner = User::findOrFail($request->user_id) ;
            if(!$owner->proprietaire){
                Proprietaire::create([
                    'user_id' => $owner->id
                ]) ;
            }
            return response()->json(['message' => 'Post successfully created'], 201);
        } catch (\Exception $th) {
            return response()->json(['message' => 'Somethind really went wrong'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        $poste = Post::findOrFail($post) ;
        if(!$poste){
            return response()->json([
                'error' => 'Ressource Not found'
            ],404) ;
        }
        $photos = $poste->images ;
        return response()->json([
            'post' => $poste,
            'photos' => $photos
        ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        
        try {
            $request->validate([
                'name' => 'required|string',
                'surface' => 'required|string',
                'nbr_piece' => 'required|string',
                'prix' => 'required|string',
                'description' => 'required|string',
                'departement' => 'required|string',
                'ville' => 'required|string',
                'quartier' => 'required|string',
                'photos.*' => 'image|mimes:jpeg,png,jpg,gif',
            ]);
            $poste = Post::findOrFail($post);
            $poste->update([
                'name' => $request->name, 'surface' => $request->surface, 'nbr_piece' => $request->nbr_piece,
                'prix' => $request->prix, 'description' => $request->description, 'departement' => $request->departement,
                'ville' => $request->ville, 'quartier' => $request->quartier, 'categorie_id' => $request->categorie_id,
                'type_id' => $request->type_id, 'user_id' => $request->user_id,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($poste->images as $image) {
                    Storage::delete($image->name);
                }
                $poste->images()->delete();
                foreach ($request->file('photos') as $image) {
                    $fileName = time().".".$image->getClientOriginalExtension() ;
                    $path = $image->storeAs('uploads', $fileName); 
                    Image::create([
                        'name' => $path,
                        'post_id' => $post->id,
                    ]) ;
                }
            }

            return response()->json(['message' => 'Article mis à jour avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Une erreur est survenue'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
       try {
            $poste = Post::findOrFail($post);
            foreach ($poste->images as $image) {
                Storage::delete($image->name);
            }
            $poste->images()->delete();
            $poste->delete() ;
            return response()->json([
                'message' => "Post successfully deleted"
            ],200) ;
       } catch (\Exception $e) {
            return response()->json(['message' => 'Une erreur est survenue'], 500);
       }
    }
}
