<?php

use App\Http\Controllers\PostUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthController::class, 'login']) ;
Route::delete('/logout',[AuthController::class, 'logout']) ;

Route::resource('users',UserController::class) ;
Route::post('users/storeCompany', [UserController::class, 'companyStore'] ) ;
Route::put('users/{user}/editCompany', [UserController::class, 'updateCompany'] ) ;
Route::get('users/{user}/posts', [UserController::class, 'consultations'])->name('users.posts') ;

Route::resource('proprietaires',ProprietaireController::class) ;
Route::get('proprietaires/{id}/posts',[ProprietaireController::class,'posts']) ;

Route::resource('types',TypeController::class) ;
Route::get('types/{type}/posts', [TypeController::class, 'posts'])->name('types.posts') ;

Route::resource('categories',CategorieController::class) ;
Route::get('categories/{category}/posts',[CategorieController::class, 'posts'])->name('categories.posts') ;

Route::resource('posts',PostController::class) ;
Route::get('posts/{id}/owner', [PostController::class, 'owner'])->name('posts.owner') ;
Route::get('posts/{id}/visitors', [PostController::class, 'visitors'])->name('posts.visitors') ;

Route::resource('consultations',PostUserController::class) ;
