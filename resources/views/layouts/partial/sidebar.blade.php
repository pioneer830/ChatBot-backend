{{--navbar--}}
@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
<div class="flex overflow-hidden">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    --}}{{-- <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"> --}}{{--
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
    <aside id="default-sidebar" style="background:#1F2937;" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    --}}{{-- <aside id="sidebar" class="fixed sr shadow top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full font-normal duration-75 lg:flex transition-width" aria-label="Sidebar"> --}}{{--
        <div class="flex items-center justify-center py-12 sidebar-logo">
            <a href="/home" class="flex">
                <img src="{{asset('assets/images/fav.png')}}" class="h-8 mr-3" alt="Prospect Pal" />
            </a>
        </div>
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <ul class="space-y-2">
                @component('components.menu')
                    @slot('route')
                        {{route('home')}}
                    @endslot
                    @slot('label')
                        Account Settings
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('is_lock_show')
                        true
                    @endslot
                    @slot('route')
                        {{route('customize')}}
                    @endslot
                    @slot('label')
                        Customize
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('is_lock_show')
                        true
                    @endslot
                    @slot('route')
                        {{route('tones.user-tone')}}
                    @endslot
                    @slot('label')
                            User Tones
                    @endslot
                    @slot('menu_icon')
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                        @endslot
                @endcomponent

                @component('components.menu')
                    @slot('is_lock_show')
                        true
                    @endslot
                    @slot('route')
                        {{route('intentions.user-intention')}}
                    @endslot
                    @slot('label')
                            User Intentions
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('route')
                        {{route('plans')}}
                    @endslot
                    @slot('label')
                        Plans
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('route')
                        {{route('showCancellationPage')}}
                    @endslot
                    @slot('label')
                        Manage Plans
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('route')
                        {{route('multi-select')}}
                    @endslot
                    @slot('label')
                        Multi Select
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @if ($user->id == 1)
                    @component('components.menu')
                        @slot('route')
                            {{route('admin')}}
                        @endslot
                        @slot('label')
                            Admin Panel
                        @endslot
                        @slot('menu_icon')
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        @endslot
                    @endcomponent
                @endif

                @component('components.menu')
                    @slot('route')
                        {{route('logout')}}
                    @endslot
                    @slot('label')
                        Sign out
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
                    @endslot
                @endcomponent

            </ul>
        </div>
    </aside>
</div>--}}

<!-- ! Sidebar -->
{{--<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Elegant</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                @component('components.menu')
                    @slot('is_lock_show')
                        true
                    @endslot
                    @slot('route')
                        {{route('customize')}}
                    @endslot
                    @slot('label')
                        Customize
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('is_lock_show')
                        true
                    @endslot
                    @slot('route')
                        {{route('tones.user-tone')}}
                    @endslot
                    @slot('label')
                        User Tones
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                  d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('is_lock_show')
                        true
                    @endslot
                    @slot('route')
                        {{route('intentions.user-intention')}}
                    @endslot
                    @slot('label')
                        User Intentions
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('route')
                        {{route('plans')}}
                    @endslot
                    @slot('label')
                        Plans
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400"
                             focusable="false" data-prefix="fas" data-icon="gem" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('route')
                        {{route('multi-select')}}
                    @endslot
                    @slot('label')
                        Multi Select
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400"
                             focusable="false" data-prefix="fas" data-icon="gem" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @component('components.menu')
                    @slot('route')
                        {{route('showCancellationPage')}}
                    @endslot
                    @slot('label')
                        Manage Plans
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400"
                             focusable="false" data-prefix="fas" data-icon="gem" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                        </svg>
                    @endslot
                @endcomponent

                @if ($user->id == 1)
                    @component('components.menu')
                        @slot('route')
                            {{route('admin')}}
                        @endslot
                        @slot('label')
                            Admin Panel
                        @endslot
                        @slot('menu_icon')
                            <svg aria-hidden="true"
                                 class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        @endslot
                    @endcomponent
                @endif

                @component('components.menu')
                    @slot('route')
                        {{route('logout')}}
                    @endslot
                    @slot('label')
                        Sign out
                    @endslot
                    @slot('menu_icon')
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    @endslot
                @endcomponent

            </ul>
        </div>
    </div>
    --}}{{--<div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="{{asset('assets/V2/app/')}}/img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Nafisa Sh.</span>
                <span class="sidebar-user__subtitle">Support manager</span>
            </div>
        </a>
    </div>--}}{{--
</aside>--}}

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{route('home')}}"><img src="{{asset('assets/V2/app/')}}/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('assets/V2/app/')}}/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{asset('assets/V2/app/')}}/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">@include('user.components.name')</h5>
                        <span>{{getCurrentPlanName()}}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="{{route('home')}}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item preview-item">--}}
{{--                        <div class="preview-thumbnail">--}}
{{--                            <div class="preview-icon bg-dark rounded-circle">--}}
{{--                                <i class="mdi mdi-onepassword  text-info"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="preview-item-content">--}}
{{--                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item preview-item">--}}
{{--                        <div class="preview-thumbnail">--}}
{{--                            <div class="preview-icon bg-dark rounded-circle">--}}
{{--                                <i class="mdi mdi-calendar-today text-success"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="preview-item-content">--}}
{{--                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        @component('components.menu')
            @slot('is_lock_show')
                true
            @endslot
            @slot('route')
                {{route('customize')}}
            @endslot
            @slot('label')
                Customize
            @endslot
            @slot('menu_icon')
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
            @endslot
        @endcomponent

        @component('components.menu')
            @slot('is_lock_show')
                true
            @endslot
            @slot('route')
                {{route('tones.user-tone')}}
            @endslot
            @slot('label')
                Customize Tones
            @endslot
            @slot('menu_icon')
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
            @endslot
        @endcomponent

        @component('components.menu')
            @slot('is_lock_show')
                true
            @endslot
            @slot('route')
                {{route('intentions.user-intention')}}
            @endslot
            @slot('label')
                Customize Intentions
            @endslot
            @slot('menu_icon')
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
            @endslot
        @endcomponent

        @component('components.menu')
            @slot('route')
                {{route('plans')}}
            @endslot
            @slot('label')
                Plans
            @endslot
            @slot('menu_icon')
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                </svg>
            @endslot
        @endcomponent

        @component('components.menu')
            @slot('route')
                {{route('multi-select')}}
            @endslot
            @slot('label')
                Multi Select
            @endslot
            @slot('menu_icon')
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                </svg>
            @endslot
        @endcomponent

        @component('components.menu')
            @slot('route')
                {{route('showCancellationPage')}}
            @endslot
            @slot('label')
                Manage Plans
            @endslot
            @slot('menu_icon')
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                </svg>
            @endslot
        @endcomponent

        @if ($user->id == 1)
            @component('components.menu')
                @slot('route')
                    {{route('admin')}}
                @endslot
                @slot('label')
                    Admin Panel
                @endslot
                @slot('menu_icon')
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                @endslot
            @endcomponent
        @endif

        @component('components.menu')
            @slot('route')
                {{route('logout')}}
            @endslot
            @slot('label')
                Sign out
            @endslot
            @slot('menu_icon')
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
            @endslot
        @endcomponent

       {{-- <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>--}}
    </ul>
</nav>


