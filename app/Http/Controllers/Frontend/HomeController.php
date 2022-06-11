<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Navbar;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {   
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $navBars = Navbar::all();
            $limitedPosts = Post::orderBy('id', 'desc')->limit(10)->get();
            $allPosts = Post::orderBy('id', 'desc')->get();
            $adminPosts = Post::where('authorId', 1)->orderBy('id', 'desc')->get(); //where admin id = 1;
            $postCategories = PostCategory::orderBy('id')->get();
            return view('frontend.index', compact('limitedPosts', 'allPosts', 'adminPosts', 'postCategories', 'navBars'));
        }else{
            return redirect('/profile/login');
        }
    }
}
