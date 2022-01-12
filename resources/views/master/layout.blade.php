<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ URL::asset('images/binusLogo.png') }}" type="image/x-icon">
    <title>@yield('title') | Binus Forum</title>
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="menu-section logo-section">
            <a href="{{ route('home') }}" class="nav-logo">
                <img src="{{ URL::asset('images/binusLogo.png') }}" alt="" class="logo-img">
            </a>
        </div>

        @guest
            <div class="menu-section profile-section">
                <a href="{{ route('login') }}" class="nav-menu dropdown">
                    <p>LOGIN</p>
                </a>
                <a href="{{ route('register') }}" class="nav-menu dropdown">
                    <p>REGISTER</p>
                </a>
            </div>
        @endguest

        @auth
            <div class="menu-section nav-section">
                <a href="{{ route('home') }}" class="nav-menu">
                    <p>Home</p>
                </a>
                <div class="dropdown">
                    <div class="dropdown-button">
                        <p>Courses</p>
                        <img src="{{ URL::asset('images/dropdown-arrow.png') }}" alt="" class="dropdown-arrow">
                    </div>

                    <div class="dropdown-content">
                        @foreach ($courses as $course)
                            <a class="dropdown-choice" href="/course/{{ $course->id }}">{{ $course->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="menu-section profile-section">
                <div class="dropdown">
                    <div class="dropdown-button">
                        <p>{{ Auth::user()->username }}</p>
                        <img src="{{ URL::asset('images/dropdown-arrow.png') }}" alt="" class="dropdown-arrow">
                    </div>
                    <div class="dropdown-content">
                        <a class="dropdown-choice" href="{{ route('create_post') }}">Create Post</a>
                        <a class="dropdown-choice" href="{{ route('bookmark') }}">My Bookmark</a>
                        <a class="dropdown-choice logout" href="{{ route('logout_process') }}">Logout</a>
                    </div>
                </div>
            </div>
        @endauth
    </div>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <div class="footer-row">
            <img class="location-icon" src="{{ URL::asset('images/location.png') }}" alt="">
            <h3 class="location">Jl. Raya Kb. Jeruk No.27</h3>
        </div>
        <div class="footer-row">
            <h3 class="copyright">&copy Binus Forum 2022</h3>
        </div>
    </footer>
</body>
</html>
