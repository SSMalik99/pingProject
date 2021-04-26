<?php

use App\Http\Controllers\main;
use App\Models\trialPosts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trialPost;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/main',[main::class,'showMain']);
Route::get('posts', [trialPost::class,'index']);
Route::get('posts/post/{id}', [trialPost::class,'show']);

Route::get('posts/addNewPost', [trialPost::class,'create']);
Route::post('posts/post/addNew', [trialPost::class,'store']);

Route::get('posts/editPost/{id}', [trialPost::class,'edit']);
Route::put('editThisPost/{id}',[trialPost::class,'update']);

Route::get('posts/deletePost/{id}', [trialPost::class,'destroy']);

Route::get('/default', function () {
    return view('default');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
