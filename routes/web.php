<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']); ////////////////////////////////////////////view home page

Route::group(['prefix' => 'articles'],function(){
    Route::get('', [PostController::class, 'index']); ////////////////////////////////////view all posts
    Route::get('/{post_id}', [PostController::class, 'show']); ///////////////////////////view individual post
    Route::get('/category/{category_id}' , [PostController::class, 'filterCategoryPost']); ///filter post
    Route::post('/store-post', [PostController::class, 'store']); //////////////////////////////////////create new post
    Route::post('/store-comment', [PostController::class, 'storeComment']); //////////////store a new comment
    Route::post('/store-reply', [PostController::class, 'storeReply']); //////////////store a new comment
});
Route::get('/categories', [PostController::class, 'showCategory']); ///////////////////////////view all categories


Route::group(['prefix' => 'profile'],function(){
    Route::get('', [UserController::class, 'index']); /////////////////////////////////////view user profile page
    Route::get('/sign-up', [UserController::class, 'signup']); ////////////////////////////////////view sign-up page
    Route::post('/create', [UserController::class, 'create']); ////////////////////////////////////create new user account
    Route::get('/login', [UserController::class, 'login']); ///////////////////////////////////////view login page
    Route::post('/validate-user', [UserController::class, 'validateUser']); ///////////////////////user login validation
    Route::get('/logout', [UserController::class, 'destroy']); ////////////////////////////////////view logout page
});