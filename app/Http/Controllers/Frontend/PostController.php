<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Navbar;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\CommentReply;

class PostController extends Controller
{
    public function index()
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $navBars = Navbar::all();
            $allPosts = Post::orderBy('id', 'desc')->get();
            $adminPosts = Post::where('authorId', 1)->orderBy('id', 'desc')->get(); //where admin id = 1;

            $allArticles = Post::orderBy('id', 'desc')->get();
            return view('frontend.all-articles', compact('allArticles', 'allPosts', 'adminPosts', 'navBars'));
        }else{
            return redirect('/profile/login');
        }
    }
    
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->postTitle = $request->postTitle;

        $image = $request->postImage;
        $imageName = $image->getClientOriginalName();
        $image->storeAs('public/frontend/images',$imageName);
        $post->postImage = $imageName;

        $post->postContent = $request->postContent;
        $post->postTags = $request->postTags;
        $post->postCategoryId = $request->postCategory;
        $post->authorId = $request->authorId;

        $postCategoryId = $request->postCategory;
        
        // Post::create($request->all()); //shortcut of the above command, for this must add protected on Post model
        
        $post->save();
        if($post->save()){
            PostCategory::where('id', $postCategoryId)->increment('postCount');
        }

        return back();
    }

    
    public function show($post_id)
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $navBars = Navbar::all();
            $postCategories = PostCategory::orderBy('id')->get();
            $post = Post::find($post_id);
            $categoryId = $post->postCategoryId;
            $postCategory = PostCategory::find($categoryId);
            $authorId = $post->authorId;
            $postAuthor = User::find($authorId);

            $postComments = Comment::where('commented_on', $post_id)->orderBy('id', 'desc')->get();

            $allPosts = Post::orderBy('id','desc')->get();
            $adminPosts = Post::where('authorId', 1)->orderBy('id', 'desc')->get(); //where admin id = 1;
            $relatedPosts = Post::where('postCategoryId', $post->postCategoryId)->where('id','!=', $post->id)->get();
            
            $postMinId = Post::min('id');
            $postMaxId = Post::max('id');

            if($post->id > $postMinId){
                $prevPost = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
                $prevPostCategory = PostCategory::find($prevPost->postCategoryId);
            }else{
                $prevPost = 'no data';
                $prevPostCategory = 'no data';
            }
            if($post->id < $postMaxId){
                $nextPost = Post::where('id', '>', $post->id)->orderBy('id')->first();
                $nextPostCategory = PostCategory::find($nextPost->postCategoryId);
            }else{
                $nextPost = 'no data';
                $nextPostCategory = 'no data';
            }

            return view('frontend.article', compact('post', 'postAuthor', 'postCategory', 'nextPost', 'nextPostCategory', 'prevPost', 'prevPostCategory', 'postMaxId', 'postMinId', 'postComments', 'postCategories', 'navBars', 'relatedPosts', 'allPosts', 'adminPosts'));

        }else{
            return redirect('/profile/login');
        }
    }

    public function showCategory()
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $navBars = Navbar::all();
            $allPosts = Post::orderBy('id', 'desc')->get();
            $adminPosts = Post::where('authorId', 1)->orderBy('id', 'desc')->get(); //where admin id = 1;

            $categories = PostCategory::all();
            
            return view('frontend.categories', compact('categories', 'navBars', 'allPosts', 'adminPosts'));
        }else{
            return redirect('/profile/login');
        }
    }

    public function filterCategoryPost($category_id)
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $navBars = Navbar::all();
            $allPosts = Post::orderBy('id', 'desc')->get();
            $adminPosts = Post::where('authorId', 1)->orderBy('id', 'desc')->get(); //where admin id = 1;

            $allArticles = Post::where('postCategoryId', $category_id)->orderBy('id', 'desc')->get();
            // $countArticles = $allArticles->count();
            return view('frontend.all-articles', compact('allArticles', 'allPosts', 'adminPosts', 'navBars'));
        }else{
            return redirect('/profile/login');
        }
    }

    public function storeComment(Request $request)
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $commentModel = new Comment;
            $commentModel->comment = $request->commentMessage;
            $commentModel->commented_on = $request->commentedPostId; //post id
            $commentModel->commenter_name = $sessionData['userName'];
            $commentModel->commenter_image = $sessionData['userImage'];
        
            $commentModel->save();
            if($commentModel->save()){
                Post::where('id', $request->commentedPostId)->increment('commentCount');
            }

            return back();
        }else{
            return redirect('/profile/login');
        }
    }

    public function storeReply(Request $request)
    {
        $sessionData = Session::get('userData');
        if($sessionData !=Null){
            $replyModel = new CommentReply;
            $replyModel->reply = $request->replyMessage;
            $replyModel->replied_on = $request->repliedCommentId; //comment id
            $replyModel->replier_name = $sessionData['userName'];
            $replyModel->replier_image = $sessionData['userImage'];
        
            $replyModel->save();

            return back();
        }else{
            return redirect('/profile/login');
        }
    }
    
    public function edit(Post $post)
    {
        //
    }

    
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    
    public function destroy(Post $post)
    {
        //
    }
}