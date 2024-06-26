<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->

</head>
<body>
    <nav>
        <div class="logo">
            LMS
        </div>
        <ul>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('courses.index') }}">Courses</a></li>
            @auth
                <li><a href="{{ route('enrolled-courses') }}">My Courses</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
