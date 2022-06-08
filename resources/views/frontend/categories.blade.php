@extends('frontend.layouts.main')
@section('page-title', 'Home')

@section('main-container')
    <!-- MAIN SECTION -->
    <main id="main">
        <!-- ALL CATEGORY SECTION -->
        <div class="container">
            <section class="allCategories">
                <h2 class="secondary-title text-capitalize text-center mb-3">all categories</h2>
                <div class="allCategories-item">
                    @foreach ($categories as $category)
                        <a href="{{ url('/articles/category', $category->id) }}" class="d-flex justify-content-between text-dark">
                            <span>{{ $category->categoryName }}</span>
                            <b>{{ $category->postCount }}</b>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection