<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg  navbar-light bg-warning border border-black">
        <div class="container-fluid">
            <div >
                <a class="navbar-brand h1" href={{ route('home') }}>© BuisBezorgd</a>
                <img src="{{ asset('images/drunk_dead.png') }}" alt="logo" class="rounded-full rounded" width="100px"/>
                <di>
                    <a href="{{ route('home') }}" class="btn btn-primary m-2">Home</a>

                    <a href="{{ route('about') }}" class="btn btn-primary m-2">about</a>
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary m-2">contact</a>
                </di>
            </div>

        </div>

        @auth
            <div class="flex gap-2 flex-col">
                <a href="{{ route('products.index') }}" class="btn btn-primary m-2">Admin Panel</a>
                <a href="{{ route('contacts.index') }}" class="btn btn-primary m-2">Messages</a>
                <a href="{{ route('logout') }}" class="btn btn-danger m-2">Logout</a>

            </div>
        @endauth
        @if(!auth()->check())
            <a href="{{ route('login') }}" class="btn btn-primary m-4 ">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary m-4">Register</a>
        @endif

    </nav>
</header>

<main>
    @yield('content')
</main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">© BuisBezorgd</p>
                </div>
            </div>
        </div>
    </footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
