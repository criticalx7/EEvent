<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Styles -->
    <script src="https://use.fontawesome.com/ebc57c5fe2.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.15.1/dist/sweetalert2.all.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">


</head>
<body class="d-flex flex-column" style="min-height: 100vh; padding-top: 55px">
<div style="flex: 1">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'EEvent') }}
                </a>

                {{--This is for resposive menu dropdown--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link d-none d-md-block" href="/">Home</a></li>
                        <li><a class="nav-link d-none d-md-block" href="{{ route('events.index') }}">Events</a></li>
                        <li><a class="nav-link d-none d-md-block" href="/about">About us</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in d-md-none mr-2"></i>Sign in</a></li>
                            <li><a class="nav-link text-danger" href="{{ route('register') }}">
                                    <i class="fa fa-pencil-square d-md-none mr-2"></i>Sign Up</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('events.create') }}">
                                    <i class="fa fa-plus d-md-none mr-2"></i>Create an Event</a></li>
                            <li class="nav-link d-none d-md-block mr-2"> |</li>
                            <li><a class="nav-link font-weight-bold" href="{{ route('profile.show') }}">
                                    <i class="fa fa-user mr-2"></i>{{Auth::user()->name}}</a></li>
                            <li><a class="nav-link font-weight-bold text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out d-md-none mr-2"></i>Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</div>
@include('layouts.footer')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
