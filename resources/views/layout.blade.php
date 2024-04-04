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
        .background{
            background-color:bisque;

        }
    </style>
    <div class="container mt-3 background">
        <ul class="nav d-flex justify-content-end">
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
</body>
</html>