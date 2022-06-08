    <!-- FOOTER -->
    <footer id="footer">
        @php
            $session_userId = Session::get('userData');
        @endphp

        @if ($session_userId!=Null)
            <!-- SLIDER SECTION -->
            <section class="slider">
                <div class="container">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            @foreach ($allPosts as $post)
                                
                                <div class="swiper-slide"><a href="{{ url('/articles', $post->id) }}"><img src="{{ asset('storage/frontend/images/'.$post->postImage) }}" alt="" class="img-fluid"></a></div>

                            @endforeach
                            
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="row mb-3">
                    <div class="col-3 text-justify">
                        <h2 class="footer-title secondary-title">about us</h2>
                        <div class="secondary-title text-secondary">
                            <p class="my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim nemo asperiores exercitationem repellat ipsum architecto?</p>
                            <address>
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                Bangladesh
                            </address>
                            <div class="phone">
                                <i class="fas fa-mobile-alt text-primary"></i>
                                +880-1234-567890
                            </div>
                            <div class="email">
                                <i class="fas fa-envelope text-primary"></i>
                                sakibrisa@gmail.com
                            </div>
                        </div>
                    </div>
                    <div class="col-3 text-justify">
                        <h2 class="footer-title secondary-title">admin post</h2>
                        <div class="feature-post">
                            @foreach ($adminPosts as $adminPost)
                                
                            
                                <div class="flex-item">
                                    <div class="article">
                                        <div class="d-flex">
                                            <a href="{{ url('/articles', $adminPost->id) }}">
                                                <img src="{{ asset('storage/frontend/images/'.$adminPost->postImage) }}" alt="" class="object-fit px-1">
                                                <div class="px-1">
                                                    <a href="{{ url('/articles', $adminPost->id) }}" class="text-title display-2 text-dark">
                                                        {{ $adminPost->postTitle }}
                                                    </a>
                                                    <div class="secondary-title text-secondary display-2">
                                                        <span><i class="far fa-clock text-primary"></i>{{ $adminPost->created_at }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-3 text-justify">
                        <div class="footer-item">
                            <h2 class="footer-title secondary-title">tags</h2>
                            <div class="tags">
                                <div class="d-flex flex-wrap">
                                    <a href="#" class="nav-link bg-light bg-gradient-hover">travel</a>
                                    <a href="#" class="nav-link bg-light bg-gradient-hover">food</a>
                                    <a href="#" class="nav-link bg-light bg-gradient-hover">lifestyle</a>
                                    <a href="#" class="nav-link bg-light bg-gradient-hover">technology</a>
                                    <a href="#" class="nav-link bg-light bg-gradient-hover">fashion</a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-item">
                            <h2 class="footer-title secondary-title mt-2">social</h2>
                            <div class="tags social">
                                <div class="d-flex flex-wrap">
                                    <a href="#" class="nav-link bg-light bg-gradient-hover"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="nav-link bg-light bg-gradient-hover"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="nav-link bg-light bg-gradient-hover"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="nav-link bg-light bg-gradient-hover"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p class="text-center text-light display-2 my-2">
                    &copy; 2021 <a href="#" class="text-primary">Sakib</a> - blog all rights reserved
                </p>
            </div>
        @else
            <div class="copyright">
                <p class="text-center text-light display-2 my-2">
                    &copy; 2021 <a href="#" class="text-primary">Sakib</a> - blog all rights reserved
                </p>
            </div>
        @endif
    </footer>

    <!-- VENDORS JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/faad279287.js" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/vendors/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/js/respond.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/js/selectivizr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js"></script>
    <!-- RECOURCES JS -->
    <script src="{{ asset('frontend/recources/js/main.js') }}"></script>
</body>
</html>