<?php


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











