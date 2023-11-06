{{--
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/toastr.min.css')}}">
@vite('resources/css/app.css')
@vite('resources/css/homepage.css')

@vite('resources/js/app.js')

<!-- Bootstrap CSS  -->
--}}
{{-- <link rel="stylesheet" hr
f="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}{{--


<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
--}}

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Elegant Dashboard | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/V2/app/')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/V2/app/')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/V2/app/')}}/css/style.css">
    @stack('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/V2/app/css/custom.css')}}">
</head>
