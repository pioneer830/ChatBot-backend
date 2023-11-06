@extends('layouts.homepage')

@section('content')
    {{--<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <div class="mx-auto md:h-screen flex flex-col justify-start items-center px-6 pt:mt-0 min-h-full b im">
        <a href="{{url('/')}}" class="text-2xl font-semibold flex pt-8 justify-center items-center mb-8 lg:mb-10">
            <img src="{{asset('assets/images/fav.png')}}" class="h-30 mr-4" alt="ProspectPal Logo">
        </a>
        <!-- Card -->
        <div class="y w x k su sc sm as nm v te" aria-hidden="true"></div>
        <!-- Illustration -->
        <div class="y _ rg v te min-h-screen sn" aria-hidden="true">
            <img src="{{asset('assets/images/hero-illustration.svg')}}" class="ri" width="2143" height="737"
                 alt="Hero Illustration">
        </div>
        <!-- Card -->
        <div class="sr shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0 text-white">
            <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                <h2 class="text-2xl lg:text-3xl font-bold">
                    Sign in to ProspectPal
                </h2>

                <form method="POST" action="{{ route('login') }}" id="prospect-login-form" class="mt-8 space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="text-sm font-medium text-gray-300 block mb-2">Email Address</label>
                        <input type="email" id="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5
                               @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                               autocomplete="email" autofocus
                               placeholder="name@example.com">

                        @error('email')
                        <span class="invalid-feedback text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="text-sm font-medium text-gray-300 block mb-2">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5
                               @error('password') is-invalid @enderror"
                               required>

                        @error('password')
                        <span class="invalid-feedback text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                                   class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">


                        </div>
                        <div class="text-sm ml-3">
                            <label for="remember" class="font-medium text-gray-300">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-blue-600 hover:underline ml-auto">Forgot Password?</a>
                        @endif
                    </div>
                    <button type="submit"
                            class="big-button">
                        Login to your account
                    </button>
                    <div class="text-sm font-medium text-gray-400">
                        Don't have an account? <a href="{{route('register')}}" class="text-blue-600 hover:underline">Create
                            account</a>
                    </div>
                        <a href="{{route('auth.google')}}" class="big-button">
                        <span>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAkCAYAAAAOwvOmAAAACXBIWXMAABCcAAAQnAEmzTo0AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAR8SURBVHgB7VdrbBRVFD53dmZ2doft7mKf9OE21Rp+gAQJAUK0xUeCWtNGWzRGKEH9IYaUGlHjj04TYoyaaBOI0ShdV4OIr/pIJaS2RUWJaYSIJkpsWSlN6XuXXTqz87jXmd0+aLs7+1BiSPbb7Gbu3HPP+c495557FiCLLLL4f4AgQ5C+PvuQ8OxGhndsVYKTlZSqOTBgoN2OgBwKf2+9pbKroM33K2SAtEmRU505o88LexVKa2IQ7SIzGsgCZTj261x+DucXvFTypu89SANpkRrZXr9RHR48TBHsoYhBg0q6hugfyuH2MjsaW911j/ghBSTXOoOx3U8+DmPD3yFCPCjqS2r+RGXDwcaRt9+thRSRkuZLj9ZsgMnxn5CCo2GKLiQzIdPjh62sSlvZC4iz8dLISAGrTxJEzckpOc7W4o7jAqSIpDs11dTkwcNjHxKZzBGa9YfwfLds56oLO0+weR1dFblHvios3vOCW7ZwO/V5P6UTuwIoLUIxzUkw2LC6jRu37TEIzSY1oiwwneN62vNp58FE66ZeFzxw9lyV+9BhL6QJU1JkurlUPekbEHsdtHgqLypukNNKS1uLvZ8IcI1gSko8WfQYLY37EGggnskDsbsEwOo+lv9Z11a4hqDNJhkiPUjASG4EtlsngCuVYOjntQfiydYLAsu7d22JjSxmagFriuprvrELMiFFIpFciswY0OOmuTXp/H13fAuv9SyRvSjtKuOv5H2DiTZ7LBPqtbEQ7OkhudXVSI03b376aLY8mt0kVpcYq324ulqQEokTjKMlAiGYqWQk7leSNCdfCUUJzYIZsKwtMKrJyeva3A4lLrBEl+kfTRxj052ikG3k6jHGcu7U6SpX4hXxQoaWvOdoCu5aAxOQAKY7pWHpdwrBulnnf1Fcyw4OOdfpj0uS1Mqp41abvBMoBhYTZSnLoVAYz28b0vx5CIUgE1IUX9yDwhd2GJy84k3wTrgSCKFb4pHqFcoDhtji9/e3jd4cvGxDFDUfFCdvGQAzu2aTlvxNX0wAG3gxfBu8FVqpFwf9nkPq5oZjTS9DimCw/QBadBLHg4H3IVNSqNwbeODi7W3dYoE+UIFE+yQ9SQODz63/uKHFbG37+c9d974SeiMoknsQmo8cZ4XJZ7Y7vjS1C0lQ1d7oivDSaVWLeBbPuW3L/aoot5ZxFR3eOiEQlT9aX3iDq2RbQLzcLF3aXMZM1oIFG1kS87/IpbZ+sNspwL8hZWDTkW0VKlb6dL0uQhaGInZRE+AYu348CSiqDFcXBVrPRW7sKX2j88HGiL99vW/5qmT2Umryfnz4o35KYu7UrQwitNQro2BKiggRTV5w+I1nxfYXhFbsB8b5pz88/XdNKvbSaoc3tNd6WDvfI2JJ7z5xnKq01EfjMihyrugd/ONs3Zm9vQH4r0nNYm17TSNv51tEongQwYvUxZpljUSbwhN2dtn+Hx7ydaWjP+O/WAbuPvrEmlBkckuO01UJqlqsaqqELbSfqNrA+pWrj7+6al8/ZJFFFtcR/gEidrYunrRBSwAAAABJRU5ErkJggg==" alt="" style="width: 24px; height: 24px;">
                       </span>
                            Login with chrome
                        </a>

                </form>
            </div>


        </div>
    </div>
--}}
    <main class="nk-pages">
        <div class="min-vh-100 d-flex flex-column has-mask">
            <div class="nk-mask bg-pattern-dot bg-blend-around"></div>
            <div class="text-center mt-6 mb-4">
                <a href="{{route('login')}}" class="logo-link">
                    <div class="logo-wrap"><img class="logo-img logo-light"
                                                src="{{asset('assets/images/fav.png')}}"
                                                srcset="{{asset('assets/images/fav.png')}}" alt=""><img
                            class="logo-img logo-dark" src="{{asset('assets/images/fav.png')}}"
                            srcset="{{asset('assets/images/fav.png')}}" alt=""></div>
                </a>
            </div>
            <div class="my-auto">
                <div class="container">
                    <div class="row g-gs justify-content-center">
                        <div class="col-md-7 col-lg-6 col-xl-5">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body"><h4 class="mb-3">Welcome Back!</h4>
                                    <form method="POST" action="{{route('login')}}" novalidate="">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="form-group"><label class="form-label" for="emailorusername">Email</label>
                                                    <div class="form-control-wrap"><input type="email"
                                                                                          name="email"
                                                                                          value="{{old('email')}}"
                                                                                          id="emailorusername"
                                                                                          class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                                                          placeholder="Enter Email"
                                                                                          required=""
                                                                                          fdprocessedid="p8qkzi">
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
                                                            value="{{old('email')}}"
                                                            type="password" name="password" id="toggle-password"
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                            placeholder="Enter Password" required=""
                                                            fdprocessedid="e1tjf">
                                                    <div class="invalid-feedback">@error('password') {{$message}} @enderror</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex flex-wrap justify-content-between has-gap g-3">
                                                    <div class="form-group">
                                                        <div class="form-check form-check-sm"><input
                                                                class="form-check-input" type="checkbox" value=""
                                                                id="rememberMe"><label class="form-check-label"
                                                                                       for="rememberMe"> Remember
                                                                Me </label></div>
                                                    </div>
                                                    {{--<a href="https://copygen.themenio.com/reset-s2.html" class="small">Forgot
                                                        Password?</a>--}}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-block" type="submit"
                                                            id="submit-btn" fdprocessedid="yko2qn">Login
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="small mb-3">or login with</div>
                                                <ul class="btn-list btn-list-inline gx-2">
                                                    <li><a class="btn btn-light btn-icon" href="#"><em
                                                                class="icon fs-5 ni ni-facebook-f"></em></a></li>
                                                    <li><a class="btn btn-light btn-icon"
                                                           href="{{route('auth.google')}}"><em
                                                                class="icon fs-5 ni ni-google"></em></a></li>
                                                    <li><a class="btn btn-light btn-icon" href="#"><em
                                                                class="icon fs-5 ni ni-apple"></em></a></li>
                                                </ul>
                                                <p class="mt-4">Don't have an account? <a
                                                        href="{{route('register')}}">Register</a>
                                                </p></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center text-heading mt-4 mb-6">© 2023 CopyGenAI. Template Made By <a target="_blank"
                                                                                                href="https://softnio.com">Softnio</a>
            </p></div>
    </main>
@endsection
