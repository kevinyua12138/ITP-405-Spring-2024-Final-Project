<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
    body, html {
        height: 100%; 
        margin: 0; 
        padding: 0; 
        font-family: 'Arial', sans-serif;
        background: linear-gradient(to bottom, #4b006e, #000);
        color: white; 
    }
    
    .background {
        min-height: 100%;
    }
    </style>


    <div class="background">
        <div class="container mt-3">
        <ul class="nav d-flex justify-content-end">
            <li class="nav-item">
                <a href=" {{route ('songs.index')}} " class="nav-link">Songs</a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                    <a href=" {{route ('profile.index')}} " class="nav-link">Profile</a>
                </li>

                <li class="nav-item">
                    <form method="POST" action=" {{route('auth.logout')}} ">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a href=" {{ route('profile.favorites') }}" class="nav-link">Favorites</a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('registration.index') }}" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link">Login</a>
                </li>
            @endif
        </ul>

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('main')
        </div>
    </div>
</body>
</html>