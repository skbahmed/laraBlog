@extends('frontend.layouts.main')
@section('page-title', 'Profile')

@section('main-container')
    <!-- MAIN SECTION -->
    <main id="main">
        <!-- User Info -->
        <section class="user">
            <div class="container">
                <div class="user-details text-center px-2 py-3 mb-3 box-shadow">
                    <div class="author-avatar">
                        <img src="{{ asset('storage/frontend/images/users/'.Session::get('userData')['userImage']) }}" alt="" class="rounded">
                    </div>
                    <div class="py-2">
                        <h3 class="text-dark text-capitalize">{{ Session::get('userData')['userName'] }}</h3>
                        <p class="text-secondary secondary-title my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim dignissimos sint nobis autem nisi odit id assumenda odio aut quasi.</p>
                        <div class="d-flex flex-wrap justify-content-center">
                            <a href="#" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="nav-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="nav-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="nav-link"><i class="fab fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- INPUT POST SECTION -->
        <section id="inputPost">
            <div class="container">
                <h2 class="secondary-title text-capitalize text-center mb-3">Create a new post</h2>
                <form action="{{ url('/store') }}" method="POST" class="post-form post-from-profile" enctype="multipart/form-data">
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

        <!-- USER POST SECTION -->
        <section id="userPost">
            <div class="container">
                <h2 class="secondary-title text-capitalize text-center mb-3">your posts</h2>
                <div class="grid">

                    @foreach ($userPosts as $userPost)
                        
                        <div class="grid-item box-shadow">
                            <a href="{{ url('/articles', $userPost->id) }}" class="overflow-img grid-img mb-2">
                                <img src="{{ asset('storage/frontend/images/'.$userPost->postImage) }}" class="img-fluid" alt="">
                            </a>
                            <div class="text-center px-2 grid-text">
                                <a href="{{ url('/article', $userPost->id) }}" class="text-title display-1 text-dark text-capitalize">{{ $userPost->postTitle }}</a>
                                <p class="secondary-title text-secondary display-3 my-2">
                                    <span><i class="far fa-clock text-primary"></i>{{ $userPost->created_at }}</span>
                                </p>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>
    </main>
@endsection