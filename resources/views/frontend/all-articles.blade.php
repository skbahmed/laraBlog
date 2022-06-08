@extends('frontend.layouts.main')
@section('page-title', 'Home')

@section('main-container')
    <!-- MAIN SECTION -->
    <main id="main">
        <section id="posts">
            <div class="container">
                <div class="grid">

                    @foreach ($allArticles as $allArticle)
                        <div class="grid-item box-shadow">
                            <a href="{{ url('/articles', $allArticle->id) }}" class="overflow-img grid-img mb-2">
                                <img src="{{ asset('storage/frontend/images/'.$allArticle->postImage) }}" class="img-fluid" alt="">
                            </a>
                            <div class="text-center px-2 grid-text">
                                <a href="{{ url('/articles', $allArticle->id) }}" class="text-title display-1 text-dark text-capitalize">{{ $allArticle->postTitle }}</a>
                                <p class="secondary-title text-secondary display-3 my-2">
                                    <span><i class="far fa-clock text-primary"></i>{{ $allArticle->created_at }}</span>
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </main>
@endsection