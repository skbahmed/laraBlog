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

Route::get('/articles', [PostController::class, 'index']); ////////////////////////////////////view all posts
Route::get('/articles/{post_id}', [PostController::class, 'show']); ///////////////////////////view individual post
Route::get('/articles/category/{category_id}' , [PostController::class, 'filterCategoryPost']); ///filter post
Route::post('/store', [PostController::class, 'store']); //////////////////////////////////////create new post
Route::get('/categories', [PostController::class, 'showCategory']); ///////////////////////////view all categories


Route::get('/profile', [UserController::class, 'index']); /////////////////////////////////////view user profile page
Route::get('/sign-up', [UserController::class, 'signup']); ////////////////////////////////////view sign-up page
Route::post('/create', [UserController::class, 'create']); ////////////////////////////////////create new user account
Route::get('/login', [UserController::class, 'login']); ///////////////////////////////////////view login page
Route::post('/validate-user', [UserController::class, 'validateUser']); ///////////////////////user login validation
Route::get('/logout', [UserController::class, 'destroy']); ////////////////////////////////////view logout page