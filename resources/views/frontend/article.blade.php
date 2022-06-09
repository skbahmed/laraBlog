@extends('frontend.layouts.main')
@section('page-title', 'Article')

@section('main-container')
    <!-- MAIN SECTION -->
    <main id="main">
        <!-- POST CONTENT -->
        <div class="container">
            <div class="layout-2 row">
                <div class="col-8 article-column">
                    <article id="post">
                        <div class="headings text-center">
                            <div class="category">
                                <a href="{{ url('/articles/category', $postCategory->id) }}" class="link">{{ $postCategory->categoryName }}</a>
                            </div>
                            <div class="title">
                                <h2 class="text-title text-dark text-capitalize display-1 my-2">{{ $post->postTitle }}</h2>
                            </div>
                            <div class="meta">
                                <a href="#" class="link display-2 text-secondary text-capitalize px-1"><i class="fas fa-user text-primary pr-1"></i>{{ $postAuthor->name }}</a>
                                <a href="#" class="link display-2 text-secondary px-1"><i class="fas fa-clock text-primary pr-1"></i>{{ $post->created_at }}</a>
                                <a href="#" class="link display-2 text-secondary px-1"><i class="fas fa-comments text-primary pr-1"></i>{{ $post->commentCount }}</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <img src="{{ asset('storage/frontend/images/'.$post->postImage) }}" alt="" class="thumbnail box-shadow2">
                        </div>
                        <div class="content text-dark display-2 secondary-title mt-3 text-justify">
                            <pre>
                                <p class="big-first-letter">{{ $post->postContent }}</p>
                            </pre>
                        </div>
                    </article>
                    <div class="post-footer mb-3">
                        <div class="post-tags d-flex flex-wrap justify-content-center">
                            <a href="#" class="nav-link bg-light bg-gradient-hover">travel</a>
                            <a href="#" class="nav-link bg-light bg-gradient-hover">food</a>
                            <a href="#" class="nav-link bg-light bg-gradient-hover">lifestyle</a>
                            <a href="#" class="nav-link bg-light bg-gradient-hover">technology</a>
                            <a href="#" class="nav-link bg-light bg-gradient-hover">fashion</a>
                        </div>
                        <div class="post-author text-center px-2">
                            <div class="author-avatar">
                                <img src="{{ asset('storage/frontend/images/users/'.$postAuthor->image) }}" alt="" class="rounded">
                            </div>
                            <div class="author-info py-2">
                                <h3 class="text-dark text-capitalize">{{ $postAuthor->name }}</h3>
                                <p class="text-secondary secondary-title my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim dignissimos sint nobis autem nisi odit id assumenda odio aut quasi.</p>
                                <div class="d-flex flex-wrap justify-content-center">
                                    <a href="#" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="nav-link"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="nav-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="nav-link"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-related py-2">
                            <div class="row justify-content-center next-prev-toggler">
                                @if ($post->id > $postMinId)
                                    <div class="prev px-2">
                                        <div class="py-2">
                                            <a href="{{ url('/articles', $prevPost->id) }}" class="display-2 text-dark link">
                                                <i class="fas fa-chevron-left"></i> previous post
                                            </a>
                                        </div>
                                        <article class="article d-flex text-center">
                                            <a href="{{ url('/articles', $prevPost->id) }}"><img src="{{ asset('storage/frontend/images/'.$prevPost->postImage) }}" alt="" class="object-fit"></a>
                                            <div class="cart-body px-1">
                                                <div class="category">
                                                    <a href="{{ url('/articles/category', $prevPostCategory->id) }}" class="text-primary secondary-title">{{ $prevPostCategory->categoryName }}</a>
                                                </div>
                                                <a href="{{ url('/articles', $prevPost->id) }}" class="text-title display-2 text-dark">{{ $prevPost->postTitle }}</a>
                                            </div>
                                        </article>
                                    </div>
                                @endif
                                @if ($post->id < $postMaxId)
                                    <div class="next text-right px-2">
                                        <div class="py-2">
                                            <a href="{{ url('/articles', $nextPost->id) }}" class="display-2 text-dark link">
                                                next post <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <article class="article d-flex text-center">
                                            <div class="cart-body px-1">
                                                <div class="category">
                                                    <a href="{{ url('/articles/category', $nextPostCategory->id) }}" class="text-primary secondary-title">{{ $nextPostCategory->categoryName }}</a>
                                                </div>
                                                <a href="{{ url('/articles', $nextPost->id) }}" class="text-title display-2 text-dark">{{ $nextPost->postTitle }}</a>
                                            </div>
                                            <a href="{{ url('/articles', $nextPost->id) }}"><img src="{{ asset('storage/frontend/images/'.$nextPost->postImage) }}" alt="" class="object-fit"></a>
                                        </article>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="post-comments py-2">
                            @if ($post->commentCount < 1)
                                <h3 class="text-center display-1 secondary-title py-2 text-capitalize">no available comment</h3>
                            @elseif ($post->commentCount == 1)
                                <h3 class="text-center display-1 secondary-title py-2 text-capitalize">{{ $post->commentCount }} comment</h3>
                            @else
                                <h3 class="text-center display-1 secondary-title py-2 text-capitalize">{{ $post->commentCount }} comments</h3>
                            @endif
                            <div class="comment-details">
                                @foreach ($postComments as $postComment)
                                    <div class="comment-item pt-3">
                                        <div class="d-flex align-center">
                                            <div class="commenter-avatar pr-2">
                                                <img src="{{ asset('storage/frontend/images/users/'.$postComment->commenter_image) }}" alt="" class="rounded">
                                            </div>
                                            <div class="comment-content">
                                                <h5 class="display-2 text-capitalize">{{ $postComment->commenter_name }}</h5>
                                                <pre><p class="title-secondary text-dark my-2">{{ $postComment->comment }}</p></pre>
                                            </div>
                                        </div>
                                        <div class="comment-reply">
                                            
                                            <div class="d-flex align-center">
                                                <div class="commenter-avatar pr-2">
                                                    <img src="{{ asset('storage/frontend/images/face/face2.jpg') }}" alt="" class="rounded">
                                                </div>
                                                <div class="comment-content">
                                                    <h5 class="display-2 text-capitalize">replyer name</h5>
                                                    <p class="title-secondary text-dark my-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus voluptatum, pariatur nihil facere quas tenetur expedita ea amet accusamus, quo veritatis quam minus laudantium excepturi.</p>
                                                </div>
                                            </div>
                                            <form action="{{ url('/articles/store-reply') }}" method="post" class="mt-2 comment-reply-form">
                                                @csrf
                                                <div class="d-flex justify-content-between">
                                                    <input type="text" class="form-control" name="repliedCommentId" value="{{ $postComment->id }}" hidden>
                                                    <textarea class="form-control comment-reply-message" name="replyMessage" placeholder="Reply to this comment" required></textarea>
                                                    <button type="submit" class="btn bg-gradient text-light"><i class="fas fa-paper-plane"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="comment-form mt-3">
                                <h3 class="text-center display-1 secondary-title py-2 text-capitalize">leave a comment</h3>
                                <form action="{{ url('/articles/store-comment') }}" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <input type="text" class="form-control" name="commentedPostId" value="{{ $post->id }}" hidden>
                                        <textarea class="form-control my-1 comment-message" name="commentMessage" placeholder="write your opinion here..." required></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient display-2 text-light mt-3">Share your comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <aside id="sidebar">
                        <section class="categories">
                            <h2 class="text-dark text-capitalize text-center my-2">categories</h2>
                            <div class="categories-item">
                                @foreach ($postCategories as $postCategory)
                                    <a href="{{ url('/articles/category', $postCategory->id) }}" class="d-flex justify-content-between text-dark">
                                        <span>{{ $postCategory->categoryName }}</span>
                                        <b>{{ $postCategory->postCount }}</b>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                        <section class="related-post mt-3">
                            <h2 class="text-center text-capitalize text-dark my-2">related post</h2>
                            <div class="post-item py-1">
                                @foreach ($relatedPosts as $relatedPost)
                                    <article class="d-flex py-1">
                                        <a href="{{ url('/articles', $relatedPost->id) }}" class="mr-2"><img src="{{ asset('storage/frontend/images/'.$relatedPost->postImage) }}" alt="" class="rounded"></a>
                                        <div class="cart-body">
                                            <div class="trending-category">
                                                <a href="#" class="text-primary">{{ $relatedPost->postCategory }}</a>
                                            </div>
                                            <a href="{{ url('/articles', $relatedPost->id) }}" class="text-title display-2 text-dark text-justify"><p>{{ $relatedPost->postTitle }}</p></a>
                                            <p class="my-2 secondary-title text-secondary display-3">
                                                <span><i class="far fa-clock text-primary"></i>{{ $relatedPost->created_at }}</span>
                                            </p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </main>

    
@endsection