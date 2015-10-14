<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body>
    @include('layouts.partials.nav')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ elixir('js/all.js') }}"></script>

    @include('sweet::alert')

    @yield('scripts')
</body>
</html>
