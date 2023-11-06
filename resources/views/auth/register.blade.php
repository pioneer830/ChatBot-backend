@extends('layouts.homepage')
<!-- bootstrap css -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

<!-- google font -->
{{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> --}}
@section('content')
    @include('layouts.partial.V2.register_header')
    {{--@dd($errors)--}}
    <main class="nk-pages">
        <section class="section section-bottom-0 pb-5 has-mask">
            <div class="nk-mask bg-pattern-dot bg-blend-around mt-n5 mb-10p mh-50vh"></div>
            <div class="container">
                <div class="section-head">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-7 col-lg-6 col-xl-5"><h6 class="overline-title text-primary">Start your
                                journey</h6>
                            <h2 class="title">Create account</h2></div>
                    </div>
                </div>

                <div class="section-content">
                    <div class="row g-gs justify-content-center">
                        <div class="col-md-7 col-lg-6 col-xl-5">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body">
                                    <form method="POST" action="{{route('register')}}" novalidate="">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fullname">First Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="email" name="first_name"
                                                                value="{{old('first_name')}}"
                                                                                          id="fullname"
                                                                                          class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                                                                          placeholder="Your First Name"
                                                                                          required=""
                                                                                          fdprocessedid="dd0fl8">
                                                    <div class="invalid-feedback">@error('first_name') {{$message}} @enderror</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fullname">Last Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="email" name="last_name"
                                                               value="{{old('last_name')}}"
                                                               id="fullname"
                                                               class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                                               placeholder="Your Last Name"
                                                               required=""
                                                               fdprocessedid="dd0fl8">
                                                        <div class="invalid-feedback">@error('last_name') {{$message}} @enderror</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group"><label class="form-label" for="emailaddress">Email
                                                        Address</label>
                                                    <div class="form-control-wrap">
                                                        <input type="email"
                                                                                          name="email"
                                                               value="{{old('email')}}"
                                                                                          id="emailaddress"
                                                                                          class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                                                          placeholder="name@copygen.com"
                                                                                          required=""
                                                                                          fdprocessedid="7l3m4c"
                                                                                            >
                                                        <div class="invalid-feedback">@error('email') {{$message}} @enderror</div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group"><label class="form-label" for="toggle-password">Password</label>
                                                    <div class="form-control-wrap"><a href="toggle-password"
                                                                                      class="form-control-icon end password-toggle"
                                                                                      title="Toggle show/hide password"><em
                                                                class="on icon ni ni-eye text-base"></em><em
                                                                class="off icon ni ni-eye-off text-base"></em></a>
                                                        <input
                                                            value="{{old('password')}}"
                                                            type="password" name="password" id="toggle-password"
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                            placeholder="Enter Password" required=""
                                                            fdprocessedid="736zum">
                                                        <div class="invalid-feedback">@error('password') {{$message}} @enderror</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    <div class="form-check form-check-sm"><input
                                                            class="form-check-input" type="checkbox" value=""
                                                            id="iAgree"><label class="form-check-label small"
                                                                               for="iAgree"> I agree to <a href="#">privacy
                                                                policy</a> &amp; <a
                                                                href="https://copygen.themenio.com/terms-condition.html">terms</a></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-block" type="submit"
                                                            id="submit-btn" fdprocessedid="id5mma">Create Account
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="small mb-3">or signup with</div>
                                                <ul class="btn-list btn-list-inline gx-2">
                                                    <li><a class="btn btn-light btn-icon" href="#"><em
                                                                class="icon fs-5 ni ni-facebook-f"></em></a></li>
                                                    <li><a class="btn btn-light btn-icon" href="{{route('auth.google')}}"><em
                                                                class="icon fs-5 ni ni-google"></em></a></li>
                                                    <li><a class="btn btn-light btn-icon" href="#"><em
                                                                class="icon fs-5 ni ni-apple"></em></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <p class="text-center mt-4">Already have an account? <a
                                    href="{{route('login')}}">Login</a></p></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{--    <script src="https://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>--}}
    {{--    <script src="https://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>--}}

    {{--    <style>--}}
    {{--        /*custom font*/--}}
    {{--        @import url(https://fonts.googleapis.com/css?family=Montserrat);--}}

    {{--        /*basic reset*/--}}
    {{--        * {--}}
    {{--            margin: 0;--}}
    {{--            padding: 0;--}}
    {{--        }--}}

    {{--        html {--}}
    {{--            /* height: 100%; */--}}
    {{--            /*Image only BG fallback*/--}}
    {{--            /* background: url('http://thecodeplayer.com/uploads/media/gs.png'); */--}}
    {{--            /*background = gradient + image pattern combo*/--}}
    {{--            /* background:  */--}}
    {{--            /* linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)),  */--}}
    {{--            /* url('http://thecodeplayer.com/uploads/media/gs.png'); */--}}
    {{--        }--}}

    {{--        body {--}}
    {{--            font-family: montserrat, arial, verdana;--}}
    {{--        }--}}

    {{--        /*form styles*/--}}
    {{--        fieldset {--}}
    {{--            width: 100%;--}}
    {{--        }--}}

    {{--        #msform {--}}
    {{--            width: 700px;--}}
    {{--            margin: 50px auto;--}}
    {{--            text-align: left;--}}
    {{--            position: relative;--}}
    {{--            color: #fff;--}}
    {{--        }--}}

    {{--        #msform fieldset {--}}
    {{--            /*background: white;*/--}}
    {{--            border: 0 none;--}}
    {{--            border-radius: 3px;--}}
    {{--            /*box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);*/--}}
    {{--            padding: 20px 30px;--}}

    {{--            box-sizing: border-box;--}}
    {{--            width: 80%;--}}
    {{--            margin: 0 10%;--}}

    {{--            /*stacking fieldsets above each other*/--}}
    {{--            position: absolute;--}}
    {{--        }--}}

    {{--        /*Hide all except first fieldset*/--}}
    {{--        #msform fieldset:not(:first-of-type) {--}}
    {{--            display: none;--}}
    {{--        }--}}

    {{--        /*inputs*/--}}
    {{--        #msform input, #msform textarea, #msform select, #msform option {--}}
    {{--            /*border: 1px solid #ccc;*/--}}
    {{--            margin-bottom: 10px;--}}
    {{--            width: 100%;--}}
    {{--            box-sizing: border-box;--}}
    {{--            font-family: montserrat;--}}
    {{--            cursor: pointer;--}}
    {{--        }--}}

    {{--        /*buttons*/--}}
    {{--        #msform .action-button {--}}
    {{--            width: 100px;--}}
    {{--            border: none;--}}
    {{--            font-size: 16px;--}}
    {{--            /*background: #27AE60;*/--}}
    {{--            /*font-weight: bold;*/--}}
    {{--            /*color: white;*/--}}
    {{--            /*border: 0 none;*/--}}
    {{--            /*border-radius: 1px;*/--}}
    {{--            /*cursor: pointer;*/--}}
    {{--            /*padding: 10px 5px;*/--}}
    {{--            /*margin: 10px 5px;*/--}}
    {{--            --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);--}}
    {{--            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);--}}
    {{--            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);--}}

    {{--            --tw-text-opacity: 1;--}}
    {{--            color: rgb(255 255 255 / var(--tw-text-opacity));--}}

    {{--            --tw-gradient-from: #2563eb;--}}
    {{--            --tw-gradient-to: rgb(37 99 235 / 0);--}}
    {{--            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);--}}

    {{--            background-image: linear-gradient(to top, var(--tw-gradient-stops));--}}

    {{--            padding: 0.5rem 1rem;--}}
    {{--        }--}}

    {{--        #msform .action-button:hover {--}}
    {{--            --tw-gradient-to: #3b82f6;--}}
    {{--        }--}}

    {{--        #msform .process-button {--}}
    {{--            width: 100%;--}}
    {{--            margin-top: 12px;--}}
    {{--        }--}}

    {{--        /*#msform .action-button:hover, #msform .action-button:focus {*/--}}
    {{--        /*	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;*/--}}
    {{--        /*}*/--}}
    {{--        /*headings*/--}}

    {{--        .formTitle {--}}
    {{--            font-size: 30px;--}}
    {{--            font-weight: bold;--}}

    {{--        }--}}

    {{--        .fs-title {--}}
    {{--            /* font-size: 15px; */--}}
    {{--            /* text-transform: uppercase; */--}}
    {{--            color: #fff;--}}
    {{--            margin-bottom: 10px;--}}
    {{--        }--}}

    {{--        .fs-subtitle {--}}
    {{--            font-weight: normal;--}}
    {{--            font-size: 13px;--}}
    {{--            color: #666;--}}
    {{--            margin-bottom: 20px;--}}
    {{--        }--}}

    {{--        /*progressbar*/--}}
    {{--        #progressbar {--}}
    {{--            margin-bottom: 30px;--}}
    {{--            overflow: hidden;--}}
    {{--            /*CSS counters to number the steps*/--}}
    {{--            counter-reset: step;--}}
    {{--        }--}}

    {{--        #progressbar li {--}}
    {{--            list-style-type: none;--}}
    {{--            color: white;--}}
    {{--            text-transform: uppercase;--}}
    {{--            font-size: 9px;--}}
    {{--            width: 10%;--}}
    {{--            float: left;--}}
    {{--            position: relative;--}}
    {{--        }--}}

    {{--        #progressbar li:before {--}}
    {{--            content: counter(step);--}}
    {{--            counter-increment: step;--}}
    {{--            width: 20px;--}}
    {{--            line-height: 20px;--}}
    {{--            display: block;--}}
    {{--            font-size: 10px;--}}
    {{--            color: #333;--}}
    {{--            background: white;--}}
    {{--            border-radius: 3px;--}}
    {{--            margin: 0 auto 5px auto;--}}
    {{--        }--}}

    {{--        /*progressbar connectors*/--}}
    {{--        #progressbar li:after {--}}
    {{--            content: '';--}}
    {{--            width: 100%;--}}
    {{--            height: 2px;--}}
    {{--            background: white;--}}
    {{--            position: absolute;--}}
    {{--            left: -50%;--}}
    {{--            top: 9px;--}}
    {{--            z-index: -1; /*put it behind the numbers*/--}}
    {{--        }--}}

    {{--        #progressbar li:first-child:after {--}}
    {{--            /*connector not needed before the first step*/--}}
    {{--            content: none;--}}
    {{--        }--}}

    {{--        /*marking active/completed steps green*/--}}
    {{--        /*The number of the step and the connector before it = green*/--}}
    {{--        #progressbar li.active:before, #progressbar li.active:after {--}}
    {{--            background: #27AE60;--}}
    {{--            color: white;--}}
    {{--        }--}}

    {{--    </style>--}}

    {{--    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">--}}

    {{--    <div class="mx-auto md:h-screen flex flex-col justify-start items-center px-6 pt:mt-0 min-h-full b im">--}}
    {{--        <a href="{{url('/')}}" class="text-2xl font-semibold flex pt-8 justify-center items-center mb-8 lg:mb-10">--}}
    {{--            <img src="{{asset('assets/images/fav.png')}}" class="h-30 mr-4" alt="ProspectPal Logo">--}}
    {{--        </a>--}}
    {{--        <!-- Card -->--}}
    {{--        <div class="y w x k su sc sm as nm v te" aria-hidden="true"></div>--}}
    {{--        <!-- Illustration -->--}}
    {{--        <div class="y _ rg v te min-h-screen sn" aria-hidden="true">--}}
    {{--            <img src="{{asset('assets/images/hero-illustration.svg')}}" class="ri" width="2143" height="737"--}}
    {{--                 alt="Hero Illustration">--}}
    {{--        </div>--}}
    {{--        <form id="msform" method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">--}}
    {{--            @csrf--}}
    {{--            <fieldset class="text-center sr">--}}
    {{--                <h2 class="fs-title text-2xl lg:text-3xl font-bold text-gray-300">Sign up to ProspectPal</h2>--}}
    {{--                <h3 class="fs-subtitle"></h3>--}}
    {{--                <div class="col-6 mb-2 mt-4">--}}
    {{--                    <div class="col-md-6">--}}
    {{--                        <a href="{{route('auth.google')}}" class="big-button">--}}
    {{--                            <span>--}}
    {{--                            <img--}}
    {{--                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAkCAYAAAAOwvOmAAAACXBIWXMAABCcAAAQnAEmzTo0AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAR8SURBVHgB7VdrbBRVFD53dmZ2doft7mKf9OE21Rp+gAQJAUK0xUeCWtNGWzRGKEH9IYaUGlHjj04TYoyaaBOI0ShdV4OIr/pIJaS2RUWJaYSIJkpsWSlN6XuXXTqz87jXmd0+aLs7+1BiSPbb7Gbu3HPP+c495557FiCLLLL4f4AgQ5C+PvuQ8OxGhndsVYKTlZSqOTBgoN2OgBwKf2+9pbKroM33K2SAtEmRU505o88LexVKa2IQ7SIzGsgCZTj261x+DucXvFTypu89SANpkRrZXr9RHR48TBHsoYhBg0q6hugfyuH2MjsaW911j/ghBSTXOoOx3U8+DmPD3yFCPCjqS2r+RGXDwcaRt9+thRSRkuZLj9ZsgMnxn5CCo2GKLiQzIdPjh62sSlvZC4iz8dLISAGrTxJEzckpOc7W4o7jAqSIpDs11dTkwcNjHxKZzBGa9YfwfLds56oLO0+weR1dFblHvios3vOCW7ZwO/V5P6UTuwIoLUIxzUkw2LC6jRu37TEIzSY1oiwwneN62vNp58FE66ZeFzxw9lyV+9BhL6QJU1JkurlUPekbEHsdtHgqLypukNNKS1uLvZ8IcI1gSko8WfQYLY37EGggnskDsbsEwOo+lv9Z11a4hqDNJhkiPUjASG4EtlsngCuVYOjntQfiydYLAsu7d22JjSxmagFriuprvrELMiFFIpFciswY0OOmuTXp/H13fAuv9SyRvSjtKuOv5H2DiTZ7LBPqtbEQ7OkhudXVSI03b376aLY8mt0kVpcYq324ulqQEokTjKMlAiGYqWQk7leSNCdfCUUJzYIZsKwtMKrJyeva3A4lLrBEl+kfTRxj052ikG3k6jHGcu7U6SpX4hXxQoaWvOdoCu5aAxOQAKY7pWHpdwrBulnnf1Fcyw4OOdfpj0uS1Mqp41abvBMoBhYTZSnLoVAYz28b0vx5CIUgE1IUX9yDwhd2GJy84k3wTrgSCKFb4pHqFcoDhtji9/e3jd4cvGxDFDUfFCdvGQAzu2aTlvxNX0wAG3gxfBu8FVqpFwf9nkPq5oZjTS9DimCw/QBadBLHg4H3IVNSqNwbeODi7W3dYoE+UIFE+yQ9SQODz63/uKHFbG37+c9d974SeiMoknsQmo8cZ4XJZ7Y7vjS1C0lQ1d7oivDSaVWLeBbPuW3L/aoot5ZxFR3eOiEQlT9aX3iDq2RbQLzcLF3aXMZM1oIFG1kS87/IpbZ+sNspwL8hZWDTkW0VKlb6dL0uQhaGInZRE+AYu348CSiqDFcXBVrPRW7sKX2j88HGiL99vW/5qmT2Umryfnz4o35KYu7UrQwitNQro2BKiggRTV5w+I1nxfYXhFbsB8b5pz88/XdNKvbSaoc3tNd6WDvfI2JJ7z5xnKq01EfjMihyrugd/ONs3Zm9vQH4r0nNYm17TSNv51tEongQwYvUxZpljUSbwhN2dtn+Hx7ydaWjP+O/WAbuPvrEmlBkckuO01UJqlqsaqqELbSfqNrA+pWrj7+6al8/ZJFFFtcR/gEidrYunrRBSwAAAABJRU5ErkJggg=="--}}
    {{--                                alt="" style="width: 24px; height: 24px;">--}}
    {{--                            </span>--}}
    {{--                            Sign up with Google--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <input type="button" name="next" class="big-button next process-button" value="or continue with email"/>--}}
    {{--                <div class="text-sm font-medium text-gray-300 mt-4">--}}
    {{--                    Already have an account? <a href="{{route('login')}}"--}}
    {{--                                                class="text-blue-600 hover:underline">Login</a>--}}
    {{--                </div>--}}
    {{--            </fieldset>--}}

    {{--            --}}{{-- Sign up to prospectPal fieldset --}}
    {{--            <fieldset class="sr">--}}
    {{--                <h2 class="fs-title text-2xl lg:text-3xl font-bold text-gray-300">Sign up to ProspectPal</h2>--}}
    {{--                <h3 class="fs-subtitle"></h3>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-6 mb-2">--}}
    {{--                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

    {{--                        <div class="col-md-6">--}}
    {{--                            <input id="email" type="email"--}}
    {{--                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5  @error('email') is-invalid @enderror"--}}
    {{--                                   name="email" value="{{ old('email') }}" id="email" required autocomplete="email">--}}
    {{--                            <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                            @error('email')--}}
    {{--                            <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <input type="button" name="previous" class="previous action-button" value="Previous"/>--}}
    {{--                <input type="button" name="next" class="next action-button" value="Proceed"/>--}}
    {{--                --}}{{--                <br />--}}
    {{--                --}}{{--                <br />--}}
    {{--                --}}{{--                <div class="text-sm font-medium text-gray-500">--}}
    {{--                --}}{{--                    Already have an account? ? <a href="{{route('login')}}" class="text-blue-600 hover:underline">Login</a>--}}
    {{--                --}}{{--                </div>--}}
    {{--            </fieldset>--}}

    {{--            --}}{{-- Enter your password fieldset --}}
    {{--            <fieldset class="sr">--}}
    {{--                <h2 class="fs-title text-2xl lg:text-3xl font-bold text-gray-300">Enter Your Desired Password</h2>--}}
    {{--                <h3 class="fs-subtitle"></h3>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="mb-2">--}}
    {{--                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

    {{--                        <input id="password" type="password"--}}
    {{--                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('password') is-invalid @enderror"--}}
    {{--                               name="password" required--}}
    {{--                               autocomplete="new-password">--}}

    {{--                        <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                        @error('password')--}}
    {{--                        <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}

    {{--                    <div class="mb-2">--}}

    {{--                        <label for="password-confirm"--}}
    {{--                               class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

    {{--                        <div class="col-md-6">--}}
    {{--                            <input id="password-confirm" type="password"--}}
    {{--                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"--}}
    {{--                                   name="password_confirmation" required autocomplete="new-password">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <input type="button" name="previous" class="previous action-button" value="Previous"/>--}}
    {{--                <input type="button" name="next" class="next action-button" value="Next"/>--}}
    {{--            </fieldset>--}}

    {{--            --}}{{-- Enter your name fieldset --}}
    {{--            <fieldset class="sr">--}}
    {{--                <h2 class="fs-title text-2xl lg:text-3xl font-bold text-gray-300">Enter Your Name</h2>--}}
    {{--                <h3 class="fs-subtitle"></h3>--}}

    {{--                <div class="col-6 mb-2">--}}
    {{--                    <label for="firstName"--}}
    {{--                           class="text-sm font-medium text-gray-300 block mb-2">{{ __('First Name') }}</label>--}}

    {{--                    <div class="col-md-6">--}}
    {{--                        <input id="firstName" type="text"--}}
    {{--                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('name') is-invalid @enderror"--}}
    {{--                               name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"--}}
    {{--                               autofocus>--}}

    {{--                        <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                        @error('name')--}}
    {{--                        <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                                    <strong>{{ $message }}</strong>--}}
    {{--                                </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-6 mb-2">--}}
    {{--                    <label for="lastName"--}}
    {{--                           class="text-sm font-medium text-gray-300 block mb-2">{{ __('Last Name') }}</label>--}}

    {{--                    <div class="col-md-6">--}}
    {{--                        <input id="lastName" type="text"--}}
    {{--                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('name') is-invalid @enderror"--}}
    {{--                               name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name"--}}
    {{--                               autofocus>--}}

    {{--                        <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                        @error('name')--}}
    {{--                        <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                                    <strong>{{ $message }}</strong>--}}
    {{--                                </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <input type="button" name="previous" class="previous action-button" value="Previous"/>--}}
    {{--                <input type="button" name="next" class="next action-button" value="Next"/>--}}
    {{--            </fieldset>--}}

    {{--            --}}{{-- Job title fieldset --}}
    {{--            <fieldset class="sr">--}}
    {{--                <h2 class="fs-title text-2xl lg:text-3xl font-bold text-gray-300">Tell us more about you</h2>--}}
    {{--                <h3 class="fs-subtitle"></h3>--}}

    {{--                <div class="col-md-6">--}}
    {{--                    <label for="jobTitle"--}}
    {{--                           class="text-sm font-medium text-gray-300 block mb-2">{{ __('Job Title') }}</label>--}}
    {{--                    <input id="jobTitle" type="text"--}}
    {{--                           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_title') is-invalid @enderror"--}}
    {{--                           name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title" autofocus>--}}

    {{--                    <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                    @error('job_title')--}}
    {{--                    <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                    @enderror--}}
    {{--                </div>--}}


    {{--                <input type="button" name="previous" class="previous action-button" value="Previous"/>--}}
    {{--                <input type="button" name="next" class="next action-button" value="Next"/>--}}
    {{--            </fieldset>--}}

    {{--            --}}{{-- Job description fieldset --}}
    {{--            <fieldset class="sr">--}}
    {{--                <h2 class="fs-title text-2xl lg:text-3xl font-bold text-gray-300">Tell us more about you</h2>--}}
    {{--                <h3 class="fs-subtitle"></h3>--}}

    {{--                <div class="col-md-6">--}}
    {{--                    <label for="jobDescription"--}}
    {{--                           class="text-sm font-medium text-gray-300 block mb-2">{{ __('Job description') }}</label>--}}
    {{--                    <textarea id="jobDescription" required--}}
    {{--                              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_description') is-invalid @enderror"--}}
    {{--                              name="job_description">{{ old('job_description') }}</textarea>--}}

    {{--                    <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                    @error('job_description')--}}
    {{--                    <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                    @enderror--}}
    {{--                </div>--}}


    {{--                <input type="button" name="previous" class="previous action-button" value="Previous"/>--}}
    {{--                <input type="button" name="next" class="next action-button" value="Next"/>--}}
    {{--            </fieldset>--}}


    {{--            --}}{{-- Select industry fieldset --}}
    {{--            <fieldset class="sr">--}}
    {{--                <h2 class="fs-title text-2xl lg:text-3xl font-bold text-gray-300">Tell us more about you</h2>--}}
    {{--                <h3 class="fs-subtitle"></h3>--}}

    {{--                --}}{{-- @include("share._job") --}}


    {{--                <div class="col-6 mb-2">--}}
    {{--                    <label for="industry"--}}
    {{--                           class="text-sm font-medium text-gray-300 block mb-2">{{ __('Industry') }}</label>--}}

    {{--                    <div class="col-md-6">--}}
    {{--                        <select id="industry" type="text"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('industry') is-invalid @enderror"--}}
    {{--                                name="industry" value="{{ old('industry') }}" required autocomplete="industry"--}}
    {{--                                autofocus>--}}
    {{--                            <option value="">Select Industry</option>--}}
    {{--                            @if (isset($industries))--}}
    {{--                                @foreach ($industries as $item)--}}
    {{--                                    <option value={{$item->id}}>{{$item->name}}</option>--}}
    {{--                                @endforeach--}}
    {{--                            @endif--}}


    {{--                        </select>--}}

    {{--                        <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                        @error('industry')--}}
    {{--                        <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                                    <strong>{{ $message }}</strong>--}}
    {{--                                </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                --}}{{--                <div class="col-6 mb-2">--}}
    {{--                --}}{{--                    <label for="industryDescription"--}}
    {{--                --}}{{--                           class="text-sm font-medium text-gray-300 block mb-2">{{ __('Industry Description') }}</label>--}}

    {{--                --}}{{--                    <div class="col-md-6">--}}
    {{--                --}}{{--                        <input id="industryDescription" type="text"--}}
    {{--                --}}{{--                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('industry_description') is-invalid @enderror"--}}
    {{--                --}}{{--                               name="industry_description" value="{{ old('industry_description') }}" required autocomplete="industry_description" autofocus>--}}

    {{--                --}}{{--                        <span class="invalid-feedback error-msg text-red-600" role="alert"></span>--}}
    {{--                --}}{{--                        @error('industry_description')--}}
    {{--                --}}{{--                        <span class="invalid-feedback text-red-600" role="alert">--}}
    {{--                --}}{{--                                    <strong>{{ $message }}</strong>--}}
    {{--                --}}{{--                                </span>--}}
    {{--                --}}{{--                        @enderror--}}
    {{--                --}}{{--                    </div>--}}
    {{--                --}}{{--                </div>--}}
    {{--                <input type="button" name="previous" class="previous action-button" value="Previous"/>--}}
    {{--                <input type="hidden" name="client_ip" value="{{ $client_ip }}"/>--}}
    {{--                <input type="hidden" name="client_id" id="prospect_client_id" value="{{ $client_id }}"/>--}}

    {{--                <button type="submit" class="r ud su sl sv fr nj ao fj">--}}
    {{--                    {{ __('Register') }}--}}
    {{--                </button>--}}
    {{--            </fieldset>--}}
    {{--        </form>--}}
    {{--    </div>--}}





    {{--    <script>--}}
    {{--        /*--}}
    {{--    Orginal Page: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar--}}

    {{--    */--}}
    {{--        //jQuery time--}}
    {{--        var current_fs, next_fs, previous_fs; //fieldsets--}}
    {{--        var left, opacity, scale; //fieldset properties which we will animate--}}
    {{--        var animating; //flag to prevent quick multi-click glitches--}}

    {{--        // $(document).ready(function () {--}}
    {{--        //     const clientId = sessionStorage.getItem("prospectFrameUserId");--}}
    {{--        //     $("#prospect_client_id").val(clientId);--}}
    {{--        // })--}}

    {{--        $(function () {--}}
    {{--            function getValidResult($email) {--}}
    {{--                return $.ajax({--}}
    {{--                    type: 'post',--}}
    {{--                    url: "{{ route("validEmailCheck") }}",--}}
    {{--                    data: {--}}
    {{--                        email: $email--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            }--}}

    {{--            function ValidateEmail(mail) {--}}
    {{--                //const data = await getValidResult(mail);--}}
    {{--                if (mail !== null && mail !== undefined && mail !== "" && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {--}}
    {{--                    return true--}}
    {{--                }--}}
    {{--                return false--}}
    {{--            }--}}

    {{--            async function validCheck(current_fs) {--}}
    {{--                let passAll = true;--}}
    {{--                const inputItems = current_fs.find("input");--}}
    {{--                for (let i = 0; i < inputItems.length; i++) {--}}
    {{--                    const currentItems = $(inputItems[i]);--}}
    {{--                    if (currentItems.attr('type') === "text") {--}}
    {{--                        if (currentItems.val() === "" || currentItems.val() === null || currentItems.val() === undefined) {--}}
    {{--                            passAll = false;--}}
    {{--                            currentItems.parent().find('.invalid-feedback.error-msg').html(`This filed is required`);--}}
    {{--                        } else {--}}
    {{--                            currentItems.parent().find('.invalid-feedback.error-msg').html(``);--}}
    {{--                        }--}}
    {{--                    } else if (currentItems.attr('type') === 'email') {--}}
    {{--                        const validResult = ValidateEmail(currentItems.val());--}}
    {{--                        const data = await getValidResult(currentItems.val());--}}
    {{--                        if (!validResult) {--}}
    {{--                            passAll = false;--}}
    {{--                            currentItems.parent().find('.invalid-feedback.error-msg').html(`A valid email address is required.`);--}}
    {{--                        } else if (!data.result) {--}}
    {{--                            passAll = false;--}}
    {{--                            currentItems.parent().find('.invalid-feedback.error-msg').html(`Email is already taken.`);--}}
    {{--                        } else {--}}
    {{--                            currentItems.parent().find('.invalid-feedback.error-msg').html(``);--}}
    {{--                        }--}}
    {{--                    } else if (currentItems.attr('type') === "password") {--}}
    {{--                        if (currentItems.val() === "" || currentItems.val() === null || currentItems.val() === undefined) {--}}
    {{--                            $('#password').parent().find('.invalid-feedback.error-msg').html(`Password is required.`);--}}
    {{--                            passAll = false;--}}
    {{--                        } else if ($("#password").val() !== $("#password-confirm").val()) {--}}
    {{--                            $('#password').parent().find('.invalid-feedback.error-msg').html(`Password and password confirmation does not match`);--}}
    {{--                            passAll = false;--}}
    {{--                        } else if ($("#password").val().length < 8) {--}}
    {{--                            $('#password').parent().find('.invalid-feedback.error-msg').html(`Password must be at least 8 characters.`);--}}
    {{--                            passAll = false;--}}
    {{--                        } else {--}}
    {{--                            $('#password').parent().find('.invalid-feedback.error-msg').html(``);--}}
    {{--                        }--}}
    {{--                    }--}}
    {{--                }--}}
    {{--                return passAll;--}}
    {{--            }--}}

    {{--            $(".next").click(async function () {--}}
    {{--                if (animating) return false;--}}
    {{--                animating = true;--}}

    {{--                current_fs = $(this).parent();--}}
    {{--                next_fs = $(this).parent().next();--}}
    {{--                if (current_fs.find("input").length > 0) {--}}
    {{--                    const passResult = await validCheck(current_fs);--}}
    {{--                    if (!passResult) {--}}
    {{--                        animating = false;--}}
    {{--                        return false;--}}
    {{--                    }--}}
    {{--                }--}}
    {{--                //activate next step on progressbar using the index of next_fs--}}
    {{--                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");--}}

    {{--                //show the next fieldset--}}
    {{--                next_fs.show();--}}
    {{--                //hide the current fieldset with style--}}
    {{--                current_fs.animate({opacity: 0}, {--}}
    {{--                    step: function (now, mx) {--}}
    {{--                        //as the opacity of current_fs reduces to 0 - stored in "now"--}}
    {{--                        //1. scale current_fs down to 80%--}}
    {{--                        scale = 1 - (1 - now) * 0.2;--}}
    {{--                        //2. bring next_fs from the right(50%)--}}
    {{--                        left = (now * 50) + "%";--}}
    {{--                        //3. increase opacity of next_fs to 1 as it moves in--}}
    {{--                        opacity = 1 - now;--}}
    {{--                        current_fs.css({'transform': 'scale(' + scale + ')'});--}}
    {{--                        next_fs.css({'left': left, 'opacity': opacity});--}}
    {{--                    },--}}
    {{--                    duration: 800,--}}
    {{--                    complete: function () {--}}
    {{--                        current_fs.hide();--}}
    {{--                        animating = false;--}}
    {{--                    },--}}
    {{--                    //this comes from the custom easing plugin--}}
    {{--                    easing: 'easeInOutBack'--}}
    {{--                });--}}
    {{--            });--}}

    {{--            $(".previous").click(function () {--}}
    {{--                if (animating) return false;--}}
    {{--                animating = true;--}}

    {{--                current_fs = $(this).parent();--}}
    {{--                previous_fs = $(this).parent().prev();--}}

    {{--                //de-activate current step on progressbar--}}
    {{--                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");--}}

    {{--                //show the previous fieldset--}}
    {{--                previous_fs.show();--}}
    {{--                //hide the current fieldset with style--}}
    {{--                current_fs.animate({opacity: 0}, {--}}
    {{--                    step: function (now, mx) {--}}
    {{--                        //as the opacity of current_fs reduces to 0 - stored in "now"--}}
    {{--                        //1. scale previous_fs from 80% to 100%--}}
    {{--                        scale = 0.8 + (1 - now) * 0.2;--}}
    {{--                        //2. take current_fs to the right(50%) - from 0%--}}
    {{--                        left = ((1 - now) * 50) + "%";--}}
    {{--                        //3. increase opacity of previous_fs to 1 as it moves in--}}
    {{--                        opacity = 1 - now;--}}
    {{--                        current_fs.css({'left': left});--}}
    {{--                        previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});--}}
    {{--                    },--}}
    {{--                    duration: 800,--}}
    {{--                    complete: function () {--}}
    {{--                        current_fs.hide();--}}
    {{--                        animating = false;--}}
    {{--                    },--}}
    {{--                    //this comes from the custom easing plugin--}}
    {{--                    easing: 'easeInOutBack'--}}
    {{--                });--}}
    {{--            });--}}

    {{--            $(".submit").click(function () {--}}
    {{--                return false;--}}
    {{--            });--}}
    {{--        });--}}

    {{--        function checkInp() {--}}
    {{--            var inputs, index, elem;--}}

    {{--            inputs = document.getElementsByTagName('input');--}}
    {{--            for (var i = 0; i < inputs.length; i++) {--}}
    {{--                if (inputs[i].value === "" || isNaN(inputs[i].value)) {--}}
    {{--                    document.getElementById(inputs[i].id).style.border = "2px solid red";--}}
    {{--                } else {--}}
    {{--                    document.getElementById(inputs[i].id).style.border = "1px solid black";--}}
    {{--                }--}}
    {{--            }--}}

    {{--            if (inputs == null) {--}}
    {{--                return true;--}}
    {{--            } else {--}}
    {{--                alert("All input fields are mandatory")--}}
    {{--                return false;--}}
    {{--            }--}}

    {{--            /*var x = document.forms.formMain.inputTankAIrr.value;--}}
    {{--            var y = document.forms.formMain.inputTankBIrr.value;--}}

    {{--            if (isNaN(x)|| isNaN(y))--}}
    {{--            {--}}
    {{--              alert("Must input numbers");--}}
    {{--              return false;--}}
    {{--            } else if(x === "" || y === ""){--}}
    {{--              alert("Input fields are mandatory")--}}
    {{--              return false;--}}
    {{--            } else {--}}
    {{--              return true;--}}
    {{--            }*/--}}
    {{--        }--}}

    {{--        function colorInput() {--}}
    {{--            document.getElementById("inputTankAIrr").style.border = "2px solid red";--}}
    {{--        }--}}

    {{--        function changeOutput() {--}}
    {{--            var currentVal = document.getElementById("selectWtrAnalysis").value;--}}

    {{--            if (currentVal === "ppm" || currentVal === "meq") {--}}
    {{--                document.getElementById('divPpmMeq').style.display = "";--}}
    {{--            } else {--}}
    {{--                document.getElementById('divPpmMeq').style.display = "none";--}}
    {{--            }--}}
    {{--        }--}}

    {{--    </script>--}}
@endsection
