<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostProprietaireController;
use App\Http\Controllers\PostUserController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('welcome') ;
});


Route::resource('users',UserController::class) ;
Route::get('users/{user}/posts', [UserController::class, 'consultations'])->name('users.posts') ;

Route::resource('proprietaires',ProprietaireController::class) ;
Route::get('proprietaires/{id}/posts',[ProprietaireController::class,'posts']) ;

Route::resource('posts',PostController::class) ;

Route::resource('types',TypeController::class) ;
Route::get('types/{type}/posts', [TypeController::class, 'posts'])->name('types.posts') ;

Route::resource('categories',CategorieController::class) ;
Route::get('categories/{category}/posts',[CategorieController::class, 'posts'])->name('categories.posts') ;

Route::resource('consultations',PostUserController::class) ;



