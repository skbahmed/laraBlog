<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Navbar;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {   
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $navBars = Navbar::all();
            $allPosts = Post::orderBy('id', 'desc')->get();
            $adminPosts = Post::where('authorId', 1)->orderBy('id', 'desc')->get(); //where admin id = 1;
            $postCategories = PostCategory::orderBy('id')->get();

            $userPosts = Post::where('authorId', Session::get('userData')['userId'])->orderBy('id', 'desc')->get();

            return view('frontend.profile', compact('navBars', 'allPosts', 'adminPosts', 'postCategories', 'userPosts'));
        }else{
            return redirect('/login');
        }
    }

    public function signup()
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            return back();
        }else{
            return view('frontend.auth.sign-up');
        }
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->userName;

        $image = $request->userImage;
        $imageName = $image->getClientOriginalName();
        $image->storeAs('public/frontend/images/users',$imageName);
        $user->image = $imageName;

        $user->email = $request->userEmail;
        $user->password = $request->userPass;
        $user->save();

        $userId = $user->id;
        $userName = $user->name;
        $userImage = $user->image;
        Session::put('userData', ['userId' => $userId, 'userName' => $userName, 'userImage' => $userImage]);
        // Session::put('userId', $userId);

        return redirect('/');
    }

    public function login()
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            return back();
        }else{
            return view('frontend.auth.login');
        }
    }

    public function validateUser(Request $request)
    {
        $userEmail = $request->userEmail;
        $userPassword = $request->userPass;

        $authUserData = User::where('email', $userEmail)->where('password', $userPassword)->first();
        if($authUserData)
        {
            $authUserId = $authUserData->id;
            $authUserName = $authUserData->name;
            $authUserImage = $authUserData->image;
            Session::put('userData', ['userId' => $authUserId, 'userName' => $authUserName, 'userImage' => $authUserImage]);
            // Session::put('userId', $authUserId);
            
            return redirect('/');
        }
        else
        {
            return back();
        }
    }

    public function destroy()
    {
        Session::forget('userData');
        return redirect('/login');
    }
}
