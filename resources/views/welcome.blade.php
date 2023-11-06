@extends('layouts.homepage')
@section('content')
    @component('layouts.partial.header')
        @slot('banner')
            @include('landing.banner')
        @endslot
    @endcomponent
    {{--<style>

        :root {
            --white: white;
            --gray: #999;
            --lightgray: whitesmoke;
            --darkgreen: #2a9d8f;
            --popular: #ffdd40;
            --starter: #f73859;
            --essential: #00aeef;
            --professional: #ff7f45;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

    </style>--}}
    <!-- Page content -->
    {{--<main class="rm">

        <!-- Hero -->
        <section class="b im">

            <!-- Bg gradient -->
            <div class="y w x k su sc sm as nm v te" aria-hidden="true"></div>

            <!-- Illustration -->
            <div class="y _ rg v te" aria-hidden="true">
                <img src="{{asset('assets/{{asset('assets/V2/images/')}}/hero-illustration.svg')}}" class="ri" width="2143" height="737"
                     alt="Hero Illustration">
            </div>

            <div class="b rr tf ot ld">
                <div class="ov om ch cp">

                    <!-- Hero content -->
                    <div class="rs tf lk ly ox cv">

                        <div data-aos="zoom-out" class="aos-init aos-animate">
                            <div class="b oj um sr ig na ot oi td ft ad am av ag a_ aj fe aq ax">
                                <div class="up">Add to Chrome. <a class="ui ug nc ie al ah ap fj" href="#">Install Extension <span class="uc fq ac ah ap tp">-&gt;</span></a></div>
                            </div>
                        </div>
                        <h1 class="h1 o_ td aos-init aos-animate" data-aos="zoom-out" data-aos-delay="100">Your AI
                            powered <em class="font-italic">Helper</em></h1>
                        <p class="oq up tv aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">Prospect Pal
                            is a browser extension that enhance search engines with the power of ChatGPT. It
                            works by showing ChatGPT response alongside normal search engine results.</p>
                        <div class="ro tf lo li lf cs if lh lp aos-init aos-animate" data-aos="zoom-out"
                             data-aos-delay="300">
                            <div>
                                <a class="n ud su sl sv fr nj ao fj" href="#">
                                    Get Started For Free <span class="uc uv fq ac ah ap tp">-&gt;</span>
                                </a>
                            </div>
                            <div>
                                <a class="n um su sc sg fi nj ao" href="#">Explore Tutorials</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- Features -->
        <section>
            <div class="rr tf ot ld">
                <div class="oo ca">

                    <!-- Section header -->
                    <div class="ox om cp">
                        <h3 class="h2 o_ aos-init aos-animate" data-aos="zoom-out">Just Select a text and click on
                            Prospect Pal</h3>
                    </div>

                    <div class="og aos-init aos-animate" data-aos="zoom-out">
                        <img src="{{asset('assets/{{asset('assets/V2/images/')}}/hero.png')}}" width="1104" height="512"
                             alt="Features">
                    </div>

                    <!-- Items -->
                    <div class="ru tf nh io ce he rz lj">

                        <!-- 1st item -->
                        <div class="nl rj ie aos-init aos-animate" data-aos="zoom-out">
                            <div class="tm">
                                <svg width="56" height="56" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <radialgradient cx="50%" cy="89.845%" fx="50%" fy="89.845%" r="89.85%"
                                                        id="icon1-b">
                                            <stop stop-color="#3B82F6" stop-opacity=".64" offset="0%"></stop>
                                            <stop stop-color="#F472B6" stop-opacity=".876" offset="100%"></stop>
                                        </radialgradient>
                                        <circle id="icon1-a" cx="28" cy="28" r="28"></circle>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <use fill="url(#icon1-b)" xlink:href="#icon1-a"></use>
                                        <g stroke="#FDF2F8" stroke-linecap="square" stroke-width="2">
                                            <path d="M17 28h22" opacity=".64"></path>
                                            <path d="M20 23v-3h3M33 20h3v3M36 33v3h-3M23 36h-3v-3"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <h4 class="h4 uy ox tg">Select a text</h4>
                            <p class="oz up ox">Just highlight any text on the page and open the Prospect Extension.</p>
                        </div>

                        <!-- 2nd item -->
                        <div class="nl rj ie aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                            <div class="tm">
                                <svg width="56" height="56" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <radialgradient cx="50%" cy="89.845%" fx="50%" fy="89.845%" r="89.85%"
                                                        id="icon2-b">
                                            <stop stop-color="#3B82F6" stop-opacity=".64" offset="0%"></stop>
                                            <stop stop-color="#F472B6" stop-opacity=".876" offset="100%"></stop>
                                        </radialgradient>
                                        <circle id="icon2-a" cx="28" cy="28" r="28"></circle>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <use fill="url(#icon2-b)" xlink:href="#icon2-a"></use>
                                        <g stroke="#FDF2F8" stroke-linecap="square" stroke-width="2">
                                            <path d="m22 24-4 4 4 4M34 24l4 4-4 4"></path>
                                            <path d="m26 36 4-16" opacity=".64"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <h4 class="h4 uy ox tg">Get Response in Seconds</h4>
                            <p class="oz up ox">A Response will be generated based on your query and shared in
                                seconds.</p>
                        </div>

                        <!-- 3rd item -->
                        <div class="nl rj ie aos-init aos-animate" data-aos="zoom-out" data-aos-delay="400">
                            <div class="tm">
                                <svg width="56" height="56" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <radialgradient cx="50%" cy="89.845%" fx="50%" fy="89.845%" r="89.85%"
                                                        id="icon3-b">
                                            <stop stop-color="#3B82F6" stop-opacity=".64" offset="0%"></stop>
                                            <stop stop-color="#F472B6" stop-opacity=".876" offset="100%"></stop>
                                        </radialgradient>
                                        <circle id="icon3-a" cx="28" cy="28" r="28"></circle>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <use fill="url(#icon3-b)" xlink:href="#icon3-a"></use>
                                        <g stroke="#FDF2F8" stroke-linecap="square" stroke-width="2">
                                            <path d="m18 31 4 4 12-15"></path>
                                            <path d="M39 25h-3M39 30h-7M39 35H28" opacity=".64"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <h4 class="h4 uy ox tg">Make Changes/Updates</h4>
                            <p class="oz up ox">Use the update input to request any changes on the response
                                provided.</p>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- Pricing -->
    @include("share.plans", ["show_title" => true])

    <!-- Testimonials -->
        <section class="b">

            <!-- Bg gradient: top -->
            <div class="y j x k sa sc sm as nm v te" aria-hidden="true"></div>

            <!-- Bg gradient: bottom -->
            <div class="y w x k su sh sy nb v tt" aria-hidden="true"></div>

            <div class="rr tf ot ld">
                <div class="ob cd">

                    <!-- Section header -->
                    <div class="rf tf ox om cp">
                        <h2 class="h2 o_">What Our Customers are Saying</h2>
                    </div>

                    <!-- Testimonials container -->
                    <div class="ru tf lo nh iu lu ce ll lc rz" data-aos-id-testimonials="">

                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>
                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>

                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>
                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>

                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>

                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>

                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>

                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>

                        <article class="ny nl rj sr oe aos-init aos-animate" data-aos="fade"
                                 data-aos-anchor="[data-aos-id-testimonials]" data-aos-delay="400">
                            <header class="tm">
                                <img class="ig rv" src="{{ asset('assets/{{asset('assets/V2/images/')}}/profile.png') }}"
                                     width="48" height="48" alt="Testimonial 05">
                            </header>
                            <div class="rm tj">
                                <p class="up">The best chatgpt alternative so far if you're restricted from their
                                    chatgpt plus subscription.</p>
                            </div>
                            <footer class="oj up">
                                <span class="um">Khan Mujtaba </span> - <a class="ui ug fu al ah ap" href="#">
                                    Clickable Man</a>
                            </footer>
                        </article>


                    </div>

                </div>
            </div>

        </section>

        <!-- Resources -->
        <section>
            <div class="rr tf ot ld">
                <div class="oo ca">

                    <!-- Section header -->
                    <div class="rf tf ox om cp">
                        <h2 class="h2 o_">Other available resources</h2>
                    </div>

                    <!-- Boxes -->
                    <div class="ru tf lo nh iu lu ct ll lc rz">

                        <!-- 1st Box -->
                        <a class="nu b ft ak ad am av oe fj" href="#"
                           x-show="[&#39;1&#39;, &#39;3&#39;, &#39;4&#39;].includes(category)" style="">
                            <div class="b nw re ig su sc sg nl ie ir ao tj ft ad am av ag a_ aj fe aq ax">
                                <img src="{{asset('assets/{{asset('assets/V2/images/')}}/chrome.svg')}}">
                            </div>
                            <div class="o_ oq uh us">ProspectPal Chrome</div>
                        </a>

                        <!-- 2nd Box -->
                        <a class="nu b ft ak ad am av oe fj" href="#"
                           x-show="[&#39;2&#39;, &#39;3&#39;].includes(category)" style="display: none;">
                            <div class="b nw re ig su sc sg nl ie ir ao tj ft ad am av ag a_ aj fe aq ax">
                                <svg class="sz le al ah ap" width="24" height="18"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.317 1.492c-1.53-.69-3.17-1.2-4.885-1.49a.075.075 0 0 0-.079.036c-.21.369-.444.85-.608 1.23a18.565 18.565 0 0 0-5.487 0C9.095.88 8.852.406 8.641.037A.077.077 0 0 0 8.562 0c-1.714.29-3.354.8-4.885 1.491a.07.07 0 0 0-.032.027C.533 6.093-.32 10.555.099 14.961a.08.08 0 0 0 .031.055 20.03 20.03 0 0 0 5.993 2.98.078.078 0 0 0 .084-.026c.462-.62.874-1.275 1.226-1.963.021-.04.001-.088-.041-.104a13.202 13.202 0 0 1-1.872-.878.075.075 0 0 1-.008-.125c.126-.093.252-.19.372-.287a.075.075 0 0 1 .078-.01c3.927 1.764 8.18 1.764 12.061 0a.075.075 0 0 1 .078.009c.12.097.246.195.373.288a.075.075 0 0 1-.006.125c-.598.344-1.22.635-1.873.877a.075.075 0 0 0-.041.105c.36.687.772 1.341 1.225 1.962a.077.077 0 0 0 .084.028 19.964 19.964 0 0 0 6.002-2.981.076.076 0 0 0 .032-.054c.5-5.094-.839-9.52-3.549-13.442a.06.06 0 0 0-.031-.028ZM8.02 12.278c-1.183 0-2.157-1.068-2.157-2.38 0-1.312.956-2.38 2.157-2.38 1.21 0 2.176 1.077 2.157 2.38 0 1.312-.956 2.38-2.157 2.38Zm7.975 0c-1.183 0-2.157-1.068-2.157-2.38 0-1.312.955-2.38 2.157-2.38 1.21 0 2.176 1.077 2.157 2.38 0 1.312-.946 2.38-2.157 2.38Z"
                                        fill-rule="nonzero"></path>
                                </svg>
                            </div>
                            <div class="o_ oq uh us">ProspectPal Firefox</div>
                        </a>

                        <!-- 3rd Box -->
                        <a class="nu b ft ak ad am av oe fj" href="#">
                            <div class="b nw re ig su sc sg nl ie ir ao tj ft ad am av ag a_ aj fe aq ax">
                                <img src="{{asset('assets/{{asset('assets/V2/images/')}}/firefox.svg.png')}}" alt="">
                            </div>
                            <div class="o_ oq uh us">ProspectPal Firefox</div>
                        </a>

                        <a class="nu b ft ak ad am av oe fj" href="#">
                            <div class="b nw re ig su sc sg nl ie ir ao tj ft ad am av ag a_ aj fe aq ax">
                                <svg class="sz le al ah ap" width="23" height="23"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.924 19h6.927l5.128 1.386 3.399-12.548L16 6.654V4.582l5.859 1.586a1 1 0 0 1 .704 1.226l-3.913 14.48a1 1 0 0 1-1.226.705l-12.55-3.393.05-.186Z"
                                        fill-rule="nonzero" fill-opacity=".64"></path>
                                    <rect width="14" height="17" rx="1"></rect>
                                </svg>
                            </div>
                            <div class="o_ oq uh us">ProspectPal Docs</div>
                        </a>

                        <a class="nu b ft ak ad am av oe fj" href="h#">
                            <div class="b nw re ig su sc sg nl ie ir ao tj ft ad am av ag a_ aj fe aq ax">
                                <svg class="sz le al ah ap" width="22" height="18"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.083 0H.917C.41 0 0 .448 0 1v16c0 .552.41 1 .917 1h20.166c.507 0 .917-.448.917-1V1c0-.552-.41-1-.917-1ZM9 13V5l6 4-6 4Z"
                                        fill-rule="nonzero"></path>
                                </svg>
                            </div>
                            <div class="o_ oq uh us">ProspectPal Tutorials</div>
                        </a>

                    </div>

                </div>
            </div>

        </section>

        <!-- CTA -->
        <section>
            <div class="rr tf ot ld">

                <!-- CTA box -->
                <div class="b sf sl sb iy oa of cf cl im aos-init aos-animate" data-aos="zoom-out">

                    <!-- Bg illustration -->
                    <div class="np cx y k q ry tz te" aria-hidden="true">
                        <img src="{{assert('assets/{{asset('assets/V2/images/')}}/cta-illustration.svg')}}" class="ri" width="582"
                             height="662" alt="Illustration">
                    </div>

                    <div class="nl rj cz ii ie">

                        <!-- CTA content -->
                        <div class="td cb cw ox hi">
                            <h3 class="ue uo o_ tg">Get started with ProspectPal</h3>
                            <p class="uv">It only takes a few minutes to get started with ProspectPal. Understand your
                                needs, start free, today.</p>
                        </div>

                        <!-- CTA button -->
                        <div class="rv">
                            <a class="r ud su sl sv fr nj fj ao" href="#">
                                Add to Chrome <span class="uc uv fq ac ah ap tp">-&gt;</span>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </main>--}}
    <main class="nk-pages">
        <section class="section section-lg section-bottom-0">
            <div class="container">
                <div class="section-head">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-9 col-xl-8 col-xxl-7">
                            <h6 class="overline-title text-primary">How it works</h6>
                            <h2 class="title">Instruct to our AI and generate copy</h2>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row g-gs justify-content-center">
                        <div class="col-sm-6 col-lg-4">
                            <div class="feature">
                                <div class="feature-image ms-n3"><img class="h-xl-16rem"
                                                                      src="https://copygen.themenio.com/images/gfx/process/a-alt.png"
                                                                      alt=""></div>
                                <div class="feature-text"><h4 class="title">Select writing template</h4>
                                    <p class="fs-6">Simply choose a template from available list to write content for
                                        blog posts, landing page, website content.</p></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="feature">
                                <div class="feature-image ms-n3"><img class="h-xl-16rem"
                                                                      src="https://copygen.themenio.com/images/gfx/process/b-alt.png"
                                                                      alt=""></div>
                                <div class="feature-text"><h4 class="title">Describe your topic</h4>
                                    <p class="fs-6">Provide our AI content writer with few sentences on what you want to
                                        write, and it will start writing for you.</p></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="feature">
                                <div class="feature-image ms-n3"><img class="h-xl-16rem"
                                                                      src="https://copygen.themenio.com/images/gfx/process/c-alt.png"
                                                                      alt=""></div>
                                <div class="feature-text"><h4 class="title">Select writing template</h4>
                                    <p class="fs-6">Our powerful AI tools will generate content in few second, then you
                                        can export it to wherever you need.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row g-gs justify-content-center">
                        <div class="col-sm-6 col-lg-4">
                            <div class="feature">
                                <div class="feature-text">
                                    <h4 class="title">Select a text</h4>
                                    <p class="fs-6">Just highlight any text on the page and open the Prospect
                                        Extension.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="feature">
                                <div class="feature-text">
                                    <h4 class="title">Get Response in Seconds</h4>
                                    <p class="fs-6">A Response will be generated based on your query and shared in
                                        seconds.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="feature">
                                <div class="feature-text">
                                    <h4 class="title">Make Changes/Updates</h4>
                                    <p class="fs-6">Use the update input to request any changes on the response
                                        provided.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg">
            <div class="container">
                <div class="section-head">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-9 col-xl-8 col-xxl-6">
                            <h6 class="overline-title text-primary">COPYGEN.AI OVERVIEW</h6>
                            <h2 class="title">What amazing content will you create with AI?</h2>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="overflow-hidden">
                        <ul class="nav nav-tabs nav-tabs-stretch mb-5">
                            <li class="w-100 w-sm-50 w-lg-auto">
                                <button class="nav-link w-100 w-lg-auto active"
                                        data-bs-toggle="tab" data-bs-target="#social-media-adds"><em
                                        class="icon ni ni-flag"></em><span>Social Media &amp; Ads</span></button>
                            </li>
                            <li class="w-100 w-sm-50 w-lg-auto">
                                <button class="nav-link w-100 w-lg-auto"
                                        data-bs-toggle="tab" data-bs-target="#website-copy-seo"><em
                                        class="icon ni ni-globe"></em><span>Website Copy &amp; SEO</span></button>
                            </li>
                            <li class="w-100 w-sm-50 w-lg-auto">
                                <button class="nav-link w-100 w-lg-auto"
                                        data-bs-toggle="tab" data-bs-target="#blog-section-writing"><em
                                        class="icon ni ni-edit"></em><span>Blog Section Writing</span></button>
                            </li>
                            <li class="w-100 w-sm-50 w-lg-auto">
                                <button class="nav-link w-100 w-lg-auto"
                                        data-bs-toggle="tab" data-bs-target="#ecommerce-copy"><em
                                        class="icon ni ni-briefcase"></em><span>eCommerce Copy</span></button>
                            </li>
                            <li class="w-100 w-sm-50 w-lg-auto">
                                <button class="nav-link w-100 w-lg-auto"
                                        data-bs-toggle="tab" data-bs-target="#magic-command"><em
                                        class="icon ni ni-chat-msg"></em><span>Magic Command</span></button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content p-5 card border-0 rounded-4 shadow-sm">
                        <div class="tab-pane p-lg-3 fade show active" id="social-media-adds" tabindex="0">
                            <div class="row g-gs flex-xl-row-reverse">
                                <div class="col-xl-6 col-lg-10">
                                    <div class="block-gfx"><img class="w-100 rounded-3"
                                                                src="{{asset('assets/V2/images/')}}/gfx/usecase/a.jpg"
                                                                alt=""></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="block-text pe-xl-7">
                                        <h3 class="mb-4">Generate months of social media content in minutes</h3>
                                        <p class="lead">Simply choose a template from available list to write
                                            content for blog posts, landing page, website content etc.</p>
                                        <ul class="list gy-3">
                                            <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Analyze
                                                        your business cost easily with group transaction thorugh tagging
                                                        feature.</span></li>
                                            <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Arrange
                                                        your business expenses by date, name, etc.</span></li>
                                            <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Add
                                                        more than one card for payment. Integrated with more than 50+
                                                        payment method and support bulk payment.</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-lg-3 fade" id="website-copy-seo" tabindex="0">
                            <div class="row g-gs flex-xl-row-reverse">
                                <div class="col-xl-6 col-lg-10">
                                    <div class="block-gfx"><img class="w-100 rounded-3"
                                                                src="{{asset('assets/V2/images/')}}/gfx/usecase/b.jpg"
                                                                alt=""></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="block-text pe-xl-7">
                                        <h3 class="mb-4">Improve Your Website's Visibility and User Experience</h3>
                                        <p>Your website copy is one of the most important factors in determining
                                            whether or not people stay on your website and take the actions you want
                                            them to take. It needs to be clear, concise, and engaging, while also
                                            providing valuable information that visitors will find useful.</p>
                                        <ul class="list gy-3">
                                            <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Establish
                                                        trust: By providing helpful and informative content, you can
                                                        establish yourself as an authority in your field and build trust
                                                        with your audience.</span></li>
                                            <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Build
                                                        credibility: When your website appears at the top of search
                                                        results, it can help to build credibility and trust with your
                                                        audience.</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-lg-3 fade" id="blog-section-writing" tabindex="0">
                            <div class="row g-gs flex-xl-row-reverse">
                                <div class="col-xl-6 col-lg-10">
                                    <div class="block-gfx"><img class="w-100 rounded-3"
                                                                src="{{asset('assets/V2/images/')}}/gfx/usecase/c.jpg"
                                                                alt=""></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="block-text pe-xl-7">
                                        <h3 class="mb-4">Engage Your Audience and Build Your Brand</h3>
                                        <p class="lead mb-5">In today's digital age, a blog is an essential tool for
                                            any business looking to build its brand and engage with its audience.
                                        </p>
                                        <h4>1. Identify your target audience</h4>
                                        <p>Before you start writing, it's important to identify who your target
                                            audience is. Who are you trying to reach with your blog? What are their
                                            interests and pain points?</p>
                                        <h4>2. Choose relevant topics</h4>
                                        <p>Your blog topics should be relevant to your business and your audience.
                                            Think about the questions and concerns your customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-lg-3 fade" id="ecommerce-copy" tabindex="0">
                            <div class="row g-gs flex-xl-row-reverse">
                                <div class="col-xl-6 col-lg-10">
                                    <div class="block-gfx"><img class="w-100 rounded-3"
                                                                src="{{asset('assets/V2/images/')}}/gfx/usecase/d.jpg"
                                                                alt=""></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="block-text pe-xl-7">
                                        <h3 class="mb-4">Introducing our new Wireless Bluetooth Earbuds!</h3>
                                        <p class="lead">Experience music like never before with our cutting-edge
                                            Wireless Bluetooth Earbuds. With advanced noise-cancelling technology
                                            and crystal-clear sound, you'll be able to fully immerse yourself in
                                            your favorite tunes.</p>
                                        <p>Our earbuds are ergonomically designed to fit comfortably in your ears,
                                            and they're so lightweight that you'll hardly know you're wearing them.
                                            They're also sweat-proof and water-resistant, so you can take them with
                                            you wherever you go, whether you're running, hiking, or just lounging by
                                            the pool.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-lg-3 fade" id="magic-command" tabindex="0">
                            <div class="row g-gs flex-xl-row-reverse">
                                <div class="col-xl-6 col-lg-10">
                                    <div class="block-gfx"><img class="w-100 rounded-3"
                                                                src="{{asset('assets/V2/images/')}}/gfx/usecase/e.jpg"
                                                                alt=""></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="block-text pe-xl-7">
                                        <h3 class="mb-4">Quickly write candid testimonials and reviews for people
                                            and services</h3>
                                        <p class="lead">"I've been shopping with this company for years, and I can
                                            honestly say that their customer service is second to none. I highly
                                            recommend this company to anyone looking for a great shopping
                                            experience."</p>
                                        <p>Our earbuds are ergonomically designed to fit comfortably in your ears,
                                            and they're so lightweight that you'll hardly know you're wearing them.
                                            They're also sweat-proof and water-resistant, so you can take them with
                                            you wherever you go, whether you're running, hiking, or just lounging by
                                            the pool.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg section-0">
            <div class="container">
                <div
                    class="section-wrap section-wrap-angle section-wrap-angle-top-right bg-darker is-dark rounded-4 has-shape">
                    <div class="section-content p-4 pt-3 pt-sm-5 p-sm-6 overflow-hidden">
                        <div class="nk-shape bg-shape-blur-n mt-n10p ms-n10p"></div>
                        <div class="nk-shape bg-shape-blur-o mt-n10p me-n20p end-0"></div>
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-8 col-xxl-9">
                                <div class="block-text">
                                    <h6 class="overline-title text-primary">Boost your writing productivity</h6>
                                    <h2 class="title">End writer’s block today</h2>
                                    <p class="lead mt-3">It’s like having access to a team of copywriting experts
                                        writing powerful copy for you in 1-click.</p>
                                    <ul class="btn-list btn-list-inline">
                                        <li><a href="#" class="btn btn-lg btn-primary"><span>Start writing for
                                                        free</span><em class="icon ni ni-arrow-long-right"></em></a>
                                        </li>
                                    </ul>
                                    <ul class="list list-row gy-0 gx-3">
                                        <li><em class="icon ni ni-check-circle-fill text-success"></em><span>No
                                                    credit card required</span></li>
                                        <li><em class="icon ni ni-check-circle-fill text-success"></em><span>Cancel
                                                    anytime</span></li>
                                        <li><em class="icon ni ni-check-circle-fill text-success"></em><span>10+
                                                    tools to expolore</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg section-bottom-0">
            <div class="container">
                <div class="section-head">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-9 col-xl-7 col-xxl-6">
                            <h6 class="overline-title text-primary">Pricing</h6>
                            <h2 class="title">Start your content writing with AI</h2>
                        </div>
                    </div>
                </div>
                @include('layouts.partial.V2.pricing')
            </div>
        </section>
        <section class="section section-lg section-bottom-0">
            <div class="container">
                <div class="section-head">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6"><h6 class="overline-title text-primary">
                                Testimonials</h6>
                            <h2 class="title">CopyGen is rated 4.9/5 stars in over 2,000 reviews</h2></div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row g-gs justify-content-center align-items-center">
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body">
                                    <ul class="list list-row gy-0 g-1 mb-3">
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                    </ul>
                                    <h4 class="title mb-3">It Gave Me Back Quality Time To Spend w Friends &amp;
                                        Family...</h4>
                                    <p>Explain to you how all this mistaken idea of denouncing pleasure and praising
                                        pain was born and I will give you a complete account of the system.</p>
                                    <div class="d-flex pt-3">
                                        <div class="media media-lg media-middle media-lg rounded-pill"><img
                                                src="https://copygen.themenio.com/images/avatar/author/sm-a.jpg" alt="">
                                        </div>
                                        <div class="media-info ms-3"><h5 class="mb-1">Derek Gehl</h5>
                                            <div class="sub-text">CEO at Hire &amp; Retain</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body">
                                    <ul class="list list-row gy-0 g-1 mb-3">
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                    </ul>
                                    <h4 class="title mb-3">A year of organic marketing in about 30 minutes</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis</p>
                                    <div class="d-flex pt-3">
                                        <div class="media media-lg media-middle media-lg rounded-pill"><img
                                                src="https://copygen.themenio.com/images/avatar/author/sm-b.jpg" alt="">
                                        </div>
                                        <div class="media-info ms-3"><h5 class="mb-1">Frances Burns</h5>
                                            <div class="sub-text">Designer at Softnio</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body">
                                    <ul class="list list-row gy-0 g-1 mb-3">
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                        <li><em class="icon text-warning ni ni-star-fill fs-5"></em></li>
                                    </ul>
                                    <h4 class="title mb-3">Just wanna shout out the whole team for this amazing
                                        tool</h4>
                                    <p>Explain to you how all this mistaken idea of denouncing pleasure and praising
                                        pain was born and I will give you a complete account of the system.</p>
                                    <div class="d-flex pt-3">
                                        <div class="media media-lg media-middle media-lg rounded-pill"><img
                                                src="https://copygen.themenio.com/images/avatar/author/sm-c.jpg" alt="">
                                        </div>
                                        <div class="media-info ms-3"><h5 class="mb-1">Ashley Lawson</h5>
                                            <div class="sub-text">Creative at Envato</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg ">
            <div class="container">
                <div class="section-head">
                    <div class="row justify-content-center text-center">
                        <div class="col-xl-8"><h6 class="overline-title text-primary">FAQ's</h6>
                            <h2 class="title">Frequently Asked Questions</h2></div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row g-gs justify-content-center">
                        <div class="col-xl-9 col-xxl-8">
                            <div class="accordion accordion-flush accordion-plus-minus accordion-icon-accent"
                                 id="faq-1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-1" fdprocessedid="ksayq3"> What is a copy?
                                        </button>
                                    </h2>
                                    <div id="faq-1-1" class="accordion-collapse collapse show" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-2" fdprocessedid="epngrbf"> Does CopyGen to write
                                            long articles?
                                        </button>
                                    </h2>
                                    <div id="faq-1-2" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-3" fdprocessedid="99pio"> Is the generated
                                            content original?
                                        </button>
                                    </h2>
                                    <div id="faq-1-3" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-4" fdprocessedid="swg3jc"> Do you have wordpress
                                            plugin?
                                        </button>
                                    </h2>
                                    <div id="faq-1-4" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Site footer -->
    {{--<footer>
        <div class="rr tf ot ld">

            <!-- Blocks -->
            <div class="nh la io ol cc">

                <!-- 1st block -->
                <div class="ln cg cj">
                    <div class="tg">
                        <!-- Logo -->
                        <a class="nc" href="#" aria-label="PropespectPal">
                            <img src="{{asset('assets/{{asset('assets/V2/images/')}}/fav.png')}}">
                        </a>
                    </div>
                    <div class="oj ux">
                        <a class="up fo al ah ap" href="#">Terms</a> · <a
                            class="up fo al ah ap" href="#">Privacy Policy</a>
                    </div>
                </div>

                <!-- 2nd block -->
                <div class="lr lg cy">
                    <h6 class="un uy us uu tg">ProspectPal</h6>
                    <ul class="oj ih">
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Chrome</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Docs</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Email</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Chat</a>
                        </li>
                    </ul>
                </div>

                <!-- 3rd block -->
                <div class="lr lg cy">
                    <h6 class="un uy us uu tg">Resources</h6>
                    <ul class="oj ih">
                        <li>
                            <a class="up fo al ah ap" href="#">Tutorials</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">Shortcuts</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">Channel Partners</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">Affiliate Program</a>
                        </li>
                    </ul>
                </div>

                <!-- 4th block -->
                <div class="lr lg cy">
                    <h6 class="un uy us uu tg">Other Apps</h6>
                    <ul class="oj ih">
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Chrome</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Firefox</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Brave</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">ProspectPal Docs </a>
                        </li>
                    </ul>
                </div>

                <!-- 5th block -->
                <div class="lr lg cy">
                    <h6 class="un uy us uu tg">Prospects Pal</h6>
                    <ul class="oj ih">
                        <li>
                            <a class="up fo al ah ap" href="#">About Us</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">Our Story</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">Work With Us</a>
                        </li>
                        <li>
                            <a class="up fo al ah ap" href="#">Concat Us</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </footer>--}}


@endsection

