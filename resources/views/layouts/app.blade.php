<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('products.index') }}>Products</a>
        </div>
        <div class="justify-end row p-4 gap-4">
                <a class="btn btn-sm btn-success" href={{ route('auth.login') }}>Login</a>
                <a class="btn btn-sm btn-success" href={{ route('auth.registration') }}>Register</a>
        </div>
    </nav>
</header>

<main>
    @yield('content')
</main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">© 2021 Je kale vader</p>
                </div>
            </div>
        </div>
    </footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
