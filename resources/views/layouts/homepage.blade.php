<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Prospect Pal</title>
    @include('layouts.partial.V2.head')
</head>


<body class="nk-body is-dark" data-menu-collapse="lg">

<div class="nk-app-root">
    @yield('content')
    @include('layouts.partial.V2.footer')
    @include('components.extension')
    <script src="https://copygen.themenio.com/assets/js/bundle.js?v1.4.0"></script>
    <script src="https://copygen.themenio.com/assets/js/scripts.js?v1.4.0"></script>
</div>


{{--@vite('resources/js/alpinejs.min.js')
@vite('resources/js/analytics.js')
@vite('resources/js/aos.js')--}}
</body>

</html>

