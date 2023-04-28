@php use App\Http\Controllers\ArticleController; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css"/>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Stylesheets
    ============================================= -->

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/dark.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/font-icons.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}" type="text/css"/>

    @yield('css')

    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>{{ config('app.name', 'MicroNews') }}</title>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark">
<div id="wrapper" class="clearfix">
    <header id="header" class="full-header dark">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row">

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="https://www.microporfolio.com" class="standard-logo" data-dark-logo="images/logo.png"><img
                                src="{{ URL::asset('images/logo.png') }}" alt="Canvas Logo"></a>
                        <a href="https://www.microporfolio.com" class="retina-logo" data-dark-logo="{{ URL::asset('images/logo.png') }}"><img
                                src="images/logo.png" alt="Canvas Logo"></a>
                    </div><!-- #logo end -->

                    <div class="header-misc">



                    </div>

                    <div id="primary-menu-trigger">
                        <svg class="svg-trigger" viewBox="0 0 100 100">
                            <path
                                d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                            <path d="m 30,50 h 40"></path>
                            <path
                                d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                        </svg>
                    </div>

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav class="primary-menu">

                        <ul class="menu-container">
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('welcome') }}">
                                    <div>Home</div>
                                </a>
                            </li>
                            @if (Route::has('login'))

                                @auth
                                    <li class="menu-item">
                                        <a class="menu-link" href="#"><div>Manager</div></a>
                                        <ul class="sub-menu-container">
                                            <li class="menu-item">
                                                <a class="menu-link" href="{{ route('articles.create') }}"><div>Crear Articulo</div></a>
                                            </li>
                                        </ul>
                                    </li>
                                @endauth
                            @endif

                            @if (Route::has('login'))

                                @auth
                                    <li class="menu-item">
                                    <nav x-data="{ open: false }" class="dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 blawly">
                                        <!-- Primary Navigation Menu -->
                                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                            <div class="flex justify-between h-16">
                                                <div class="flex">



                                                </div>

                                                <!-- Settings Dropdown -->
                                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                                    <x-dropdown align="right" width="48">
                                                        <x-slot name="trigger">
                                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                                <div>{{ Auth::user()->name }}</div>

                                                                <div class="ml-1">
                                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </x-slot>

                                                        <x-slot name="content">
                                                            <x-dropdown-link :href="route('profile.edit')">
                                                                {{ __('Profile') }}
                                                            </x-dropdown-link>

                                                            <!-- Authentication -->
                                                            <form method="POST" action="{{ route('logout') }}">
                                                                @csrf

                                                                <x-dropdown-link :href="route('logout')"
                                                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                                    {{ __('Log Out') }}
                                                                </x-dropdown-link>
                                                            </form>
                                                        </x-slot>
                                                    </x-dropdown>
                                                </div>

                                                <!-- Hamburger -->
                                                <div class="-mr-2 flex items-center sm:hidden">
                                                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Responsive Navigation Menu -->
                                        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">


                                            <!-- Responsive Settings Options -->
                                            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600 blawly mtop">


                                                <div class="mt-3 space-y-1">
                                                    <x-responsive-nav-link :href="route('profile.edit')">
                                                        {{ __('Profile') }}
                                                    </x-responsive-nav-link>

                                                    <!-- Authentication -->
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                        <x-responsive-nav-link :href="route('logout')"
                                                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                            {{ __('Log Out') }}
                                                        </x-responsive-nav-link>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                    </li>
                                @else
                                    <div id="top-search" class="header-misc-icon">
                                        <table class="leftydb"><tr>
                                                <td> <a href="{{ route('login') }}"
                                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 lefty">Log
                                                        in</a></td><td> <a href="{{ route('register') }}"
                                                                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 lefty">Register</a></td>
                                            </tr>

                                        </table>

                                    </div>


                                @endauth

                            @endif
                        </ul>


                    </nav><!-- #primary-menu end -->

                    <form class="top-search-form" action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.."
                               autocomplete="off">
                    </form>

                </div>
            </div>
        </div>
        <div class="header-wrap-clone"></div>
    </header><!-- #header end -->
    <!-- Page Title
            ============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark"
             style="background-image: url({{ URL::asset('images/inet.jpg') }}); background-size: cover;"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

        <div class="container clearfix">
            <h1>@yield('titlehead')</h1>
            <span>@yield('spanhead')</span>

        </div>

    </section><!-- #page-title end -->
    <!-- Content
            ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                @yield('content')

            </div>
        </div>
    </section><!-- #content end -->
</div>
<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script src="{{ URL::asset('js/jquery.js') }}"></script>
<script src="{{ URL::asset('js/plugins.min.js') }}"></script>
@yield('js')

<!-- Footer Scripts
============================================= -->
<script src="{{ URL::asset('js/functions.js') }}"></script>
</body>
</html>
