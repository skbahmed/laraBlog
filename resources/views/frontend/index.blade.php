@extends('frontend.layouts.main')
@section('page-title', 'Home')

@section('main-container')
    <!-- MAIN SECTION -->
    <main id="main">
        <!-- BLOG POST SECTION -->
        <section id="inputPost">
            <div class="container justify-center">
                <h2 class="secondary-title text-capitalize text-center mb-3">Create a new post</h2>
                <button class="btn bg-gradient display-2 text-light post-toggler">tap to write</button>
                <form action="{{ url('/articles/store-post') }}" method="POST" class="post-form" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-between flex-wrap">
                        <input type="text" class="form-control my-1 post-title" name="postTitle" placeholder="Give a title to the post" required>
                        <input type="file" class="form-control my-1 post-image" name="postImage" required>
                        <textarea class="form-control my-1 post-content" name="postContent" placeholder="Write what's on your mind" required></textarea>
                        <input type="text" class="form-control my-1 post-tags-input" name="postTags" placeholder="Add some tags for this post" required>
                        <select class="form-control my-1 post-category-input text-capitalize" name="postCategory" required>
                            <option disabled selected value="another">Select a category</option>
                            
                            @foreach ($postCategories as $postCategory)
                                <option value="{{ $postCategory->id }}">{{ $postCategory->categoryName }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control my-1 author-id" name="authorId" value="{{ Session::get('userData')['userId'] }}" hidden>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient display-2 text-light mt-3">Share your post</button>
                    </div>
                </form>
            </div>
        </section>
        <section id="posts">
            <div class="container">
                <div class="grid">

                    @foreach ($limitedPosts as $limitedPost)
                        
                        <div class="grid-item box-shadow">
                            <a href="{{ url('/articles', $limitedPost->id) }}" class="overflow-img grid-img mb-2">
                                <img src="{{ asset('storage/frontend/images/'.$limitedPost->postImage) }}" class="img-fluid" alt="">
                            </a>
                            <div class="text-center px-2 grid-text">
                                <a href="{{ url('/articles', $limitedPost->id) }}" class="text-title display-1 text-dark text-capitalize">{{ $limitedPost->postTitle }}</a>
                                <p class="secondary-title text-secondary display-3 my-2">
                                    <span><i class="far fa-clock text-primary"></i>{{ $limitedPost->created_at }}</span>
                                </p>
                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="text-center">
                    <a href="{{ url('/articles') }}" class="btn bg-gradient secondary-title text-light">load more post</a>
                </div>
            </div>
        </section>
    </main>
@endsection