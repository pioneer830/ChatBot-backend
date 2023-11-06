{{--
<header class="y nj z" style='margin-top: 1rem'>
    <div class="rr tf ot ld">
        <div class="nl ie ii nd lb">
            <!-- Site branding -->
            <div class="rv tc">
                <!-- Logo -->
                <a class="nu" href="#" aria-label="Prospect Pal">
                    <img src="{{asset('assets/images/fav.png')}}" alt="">
                </a>
            </div>
            <nav class="nl rm">
                <ul class="nl rm in rq ie">
                    @if (\Illuminate\Support\Facades\Auth::user() == null)
                        <li>
                            <a class="ui up fo on hr or nl ie al ah ap" href="{{route('login')}}">Sign in</a>
                        </li>
                        <li class="th">
                            <a class="r ud su sl sv fr nj ao fj" href="{{route('register')}}">Get Started <span
                                    class="uc uv fq ac ah ap tp">-&gt;</span>
                            </a>
                        </li>
                        @else
                        <li>
                            <a class="r ud su sl sv fr nj ao fj" href="{{route('home')}}">Account</a>
                        </li>
                    @endif
                </ul>

            </nav>

        </div>
    </div>
</header>
--}}
<header class="nk-header bg-darker is-dark has-mask overflow-hidden">
    <div class="nk-shape bg-shape-blur-pp ms-n30p mt-n20p start-50 translate-middle-x"></div>
    <div class="nk-shape bg-shape-blur-o ms-30p mb-n30p start-50 translate-middle-x"></div>
    <div class="nk-shape bg-shape-blur-p ms-n50p mt-40p start-50 translate-middle-y"></div>
    <div class="nk-mask bg-pattern-noise-a"></div>
    <div class="nk-mask bg-angle bg-angle-bottom bg-angle-white"></div>
    @include('landing.navbar')
    <div class="nk-hero pt-sm-5 pt-lg-5 pb-6 pb-sm-8 pb-lg-9">
        {{$banner ?? ""}}
    </div>
</header>
