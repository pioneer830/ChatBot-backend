<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Prospect Pal</title>
    @include('layouts.partial.head')
</head>


<body class="bg-gray-50 dark:bg-gray-800">
@yield('content')

@include('components.extension')
</body>

</html>

