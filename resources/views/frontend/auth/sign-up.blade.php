@extends('frontend.layouts.main')
@section('page-title', 'Sign Up')

@section('main-container')
    <!-- MAIN SECTION -->
    <main id="main">
        <section class="sign-up">
            <div class="container">
                <h2 class="secondary-title text-capitalize text-center mb-3">Create a new account</h2>
                <form action="{{ url('profile/create') }}" method="POST" class="sign-up-form" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-between flex-wrap">
                        <input type="text" class="form-control my-1 user-name" name="userName" placeholder="Enter your name" required>
                        <input type="file" class="form-control my-1 user-image" name="userImage" required>
                        <input type="email" class="form-control my-1 user-email" name="userEmail" placeholder="enter your email address"  required>
                        <input type="password" class="form-control my-1 user-pass" name="userPass" placeholder="give a strong password"  required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient display-2 text-light mt-3">sign up</button>
                    </div>
                </form>
                <div class="text-center mt-3 signup-login-toggler">
                    <span class="text-secondary">Already have an account?</span>
                    <a href="{{ '/profile/login' }}" class="link">Click here to login</a>
                </div>
            </div>
        </section>
    </main>
@endsection