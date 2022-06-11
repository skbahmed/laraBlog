@extends('frontend.layouts.main')
@section('page-title', 'Login')

@section('main-container')
    <!-- MAIN SECTION -->
    <main id="main">
        <section class="login">
            <div class="container">
                <h2 class="secondary-title text-capitalize text-center mb-3">Login to your account</h2>
                <form action="{{ url('profile/validate-user') }}" method="POST" class="login-form" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-between flex-wrap">
                        <input type="email" class="form-control my-1 user-email" name="userEmail" placeholder="enter your email address"  required>
                        <input type="password" class="form-control my-1 user-pass" name="userPass" placeholder="enter your password"  required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient display-2 text-light mt-3">log in</button>
                    </div>
                </form>
                <div class="text-center mt-3 signup-login-toggler">
                    <span class="text-secondary">Don't have an account?</span>
                    <a href="{{ '/profile/sign-up' }}" class="link">Click here to sign up</a>
                </div>
            </div>
        </section>
    </main>
    
@endsection