<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
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

    <script src="{{ elixir('js/all.js') }}"></script>

    @include('sweet::alert')

    @yield('scripts')
</body>
</html>
