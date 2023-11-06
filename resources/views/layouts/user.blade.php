<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Prospect Pal</title>
    @include('layouts.partial.head')
</head>
<body>
<div class="container-scroller">
    @include('layouts.partial.sidebar')
    @include('layouts.messages')
    <div class="container-fluid page-body-wrapper">
        @include('user.partials.navbar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('user.partials.footer')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('assets/V2/app/')}}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets/V2/app/')}}/js/off-canvas.js"></script>
<script src="{{asset('assets/V2/app/')}}/js/hoverable-collapse.js"></script>
<script src="{{asset('assets/V2/app/')}}/js/misc.js"></script>
<script src="{{asset('assets/V2/app/')}}/js/settings.js"></script>
<script src="{{asset('assets/V2/app/')}}/js/todolist.js"></script>
<script src="{{asset('assets/V2/app/')}}/js/custom.js"></script>
@stack('script')
@include('components.extension')
</body>

</html>
