<div class="nk-header-main nk-menu-main is-transparent will-shrink on-dark ignore-mask">
    <div class="container">
        <div class="nk-header-wrap">
            <div class="nk-header-logo"><a href="{{route('root')}}" class="logo-link">
                    <div class="logo-wrap"><img class="logo-img logo-light"
                                                src="{{asset('assets/images/fav.png')}}"
                                                srcset="{{asset('assets/images/fav.png')}}" alt=""><img
                            class="logo-img logo-dark" src="{{asset('assets/images/fav.png')}}"
                            srcset="{{asset('assets/images/fav.png')}}" alt=""></div>
                </a></div>
            <div class="nk-header-toggle">
                <button class="dark-mode-toggle"><em
                        class="off icon ni ni-sun-fill"></em><em
                        class="on icon ni ni-moon-fill"></em></button>
                <button
                    class="btn btn-light btn-icon header-menu-toggle"><em
                        class="icon ni ni-menu"></em></button>
            </div>
            <nav class="nk-header-menu nk-menu">
                <ul class="nk-menu-list mx-auto">
                    <li class="nk-menu-item has-dropdown"><a href="{{route('root')}}"
                                                             class="nk-menu-link"><span
                                class="nk-menu-text">Home</span></a>
                        {{--<div class="nk-menu-dropdown">
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item"><a class="nk-menu-link" href="index.html">Home
                                        S1</a></li>
                                <li class="nk-menu-item"><a class="nk-menu-link" href="index-s2.html">Home
                                        S2</a></li>
                                <li class="nk-menu-item"><a class="nk-menu-link" href="index-s3.html">Home
                                        S3</a></li>
                                <li class="nk-menu-item"><a class="nk-menu-link" href="index-s4.html">Home
                                        S4 <div class="badge bg-primary ms-2 me-n4 px-2 rounded-pill">New
                                        </div></a></li>
                                <li class="nk-menu-item"><a class="nk-menu-link" href="index-s5.html">Home
                                        S5 <div class="badge bg-primary ms-2 me-n4 px-2 rounded-pill">New
                                        </div></a></li>
                            </ul>
                        </div>--}}
                    </li>
                    <li class="nk-menu-item"><a href="{{route('contact')}}" class="nk-menu-link"><span
                                class="nk-menu-text">Contact</span></a></li>
                    <li class="nk-menu-item"><a href="{{route('faq')}}" class="nk-menu-link"><span
                                class="nk-menu-text">FAQ</span></a></li>
                    {{--<li class="nk-menu-item has-dropdown"><a href="#"
                                                             class="nk-menu-link nk-menu-toggle"><span
                                class="nk-menu-text">Pages</span></a>
                        <div class="nk-menu-dropdown nk-menu-mega">
                            <div class="nk-menu-mega-wrap">
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="about.html">About</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" href="usecase.html">Use
                                            Case</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="usecase-details.html">Use Case Details
                                            <div
                                                class="badge bg-primary ms-2 me-n4 px-2 rounded-pill">New
                                            </div>
                                        </a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="usecase-s2.html">Use Case S2</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="usecase-details-s2.html">Use Case Details S2
                                            <div
                                                class="badge bg-primary ms-2 me-n4 px-2 rounded-pill">New
                                            </div>
                                        </a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="pricing.html">Pricing</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="pricing-s2.html">Pricing S2</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="blog.html">Blog</a></li>
                                </ul>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="blog-single.html">Blog Single</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="features.html">Features</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="contact.html">Contact</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link"
                                                                href="contact-s2.html">Contact S2</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="login.html">Login</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="login-s2.html">Login S2</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="register.html">Register</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="register-s2.html">Register S2</a></li>
                                </ul>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="reset.html">Reset</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="reset-s2.html">Reset S2</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="404.html">404 Error</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="404-s2.html">404 Error S2</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="504.html">504 Error</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="504-s2.html">504 Error s2</a></li>
                                    <li class="nk-menu-item"><a class="nk-menu-link" target="_blank"
                                                                href="terms-condition.html">Terms &amp;
                                            Condition</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nk-menu-item"><a href="pricing.html" class="nk-menu-link"><span
                                class="nk-menu-text">Pricing</span></a></li>--}}
                </ul>
                <div class="mx-2 d-none d-lg-block"></div>
                <ul class="nk-menu-buttons flex-lg-row-reverse">
                    @if(auth()->check())
                        <li>
                            <a href="{{route('home')}}" class="btn btn-primary">Account</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('register')}}" class="btn btn-primary">Get Started</a>
                        </li>
                        <li>
                            <a class="link link-base" href="{{route('login')}}">Sign In</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
