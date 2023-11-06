<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Prospect Pal</title>
    @include('layouts.partial.head')
</head>


<body class="bg-gray-50 dark:bg-gray-800">
@include('layouts.partial.admin-header')
@include('layouts.partial.admin-sidebar')
@yield('content')
</body>

</html>
