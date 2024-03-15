@include('frontend.includes.header')

<body>

    @include('frontend.includes.navigation')

    @yield('frontend_content')



    <!-- Footer -->
    <footer class="footer ">
        {{-- <div class="position-relative">
            <svg class="footer-shape" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                width="100%" height="85px">
                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                    d="M-0.000,-0.001 L1923.000,-0.001 L1923.000,84.999 C1608.914,41.669 1279.532,19.653 962.500,19.000 C635.773,18.326 323.692,40.344 -0.000,84.999 C-0.000,-83.334 -0.000,168.332 -0.000,-0.001 Z" />
            </svg>
        </div> --}}
        <div class="container pt-5">
            <div class="row mt-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h5 class="freelance mb-4">Trending Job</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Browse Jobs</a></li>
                            <li><a href="#">Browse Categories</a></li>
                            <li><a href="#">Submit Resume</a></li>
                            <li><a href="#">Candidate Dashboard</a></li>
                            <li><a href="#">Job Alerts</a></li>
                            <li><a href="#">My Bookmarks</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="footer-link">
                        <h5 class="freelance mb-4">Trending Companies</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Shortcodes</a></li>
                            <li><a href="#">Job Page</a></li>
                            <li><a href="#">Job Page Alternative</a></li>
                            <li><a href="#">Resume Page</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <form method="POST" action="{{ route('web.subscribe') }}">
                        @csrf
                        <h5 class="freelance mb-4">Subscribe Us</h5>
                        <div class="footer-subscribe">
                            <p>Sign Up to our Newsletter to get the latest news and offers.</p>
                            <form>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-md">Get Notified</button>
                            </form>
                        </div>
                    </form>

                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <h5 class="freelance mb-4">Download App</h5>
                    <div class="footer-subscribe">
                        <p>Download the latest Slick new job apps now</p>
                        <div class="d-inline-block">
                            <a class="btn btn-white btn-sm btn-app " href="#">
                                <i class="fab fa-apple"></i>
                                <div class="btn-text text-start">
                                    <small class="fw-normal">Download on the </small>
                                    <span class="mb-0 d-block">App Store</span>
                                </div>
                            </a>
                            <a class="btn btn-white btn-sm btn-app mt-3" href="#">
                                <i class="fab fa-google-play"></i>
                                <div class="btn-text text-start">
                                    <small class="fw-normal">Get it on </small>
                                    <span class="mb-0 d-block">Google Play</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-dark mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <ul class="list-unstyled d-flex mb-0">
                                @foreach (getPage() as $page)
                                    <li class="text-white"><a
                                            href="{{ route('web.page.single', $page->slug) }}">{{ $page->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-4 mt-md-0">
                        <p class="mb-0 text-white"> &copy;Copyright <span class="freelance" href="#"
                                style="font-weight: 900"> Job Pulse
                            </span>{{ setting()->site_footer }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back To Top-->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>
    <!-- Back To Top-->

    <!-- Signin Modal Popup -->
    @include('frontend.signinModal')
    <!-- Signin Modal Popup -->

    @include('frontend.includes.footer')
