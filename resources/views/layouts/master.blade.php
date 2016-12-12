<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body>
    <header>
        @include('layouts.partials.nav')
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="page-footer orange">
        @include('layouts.partials.footer')
    </footer>

    <script src="{{ elixir('js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>
