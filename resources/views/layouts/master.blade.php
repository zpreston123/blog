<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body>
    @include('layouts.partials.nav')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    <script src="{{ elixir('js/all.js') }}"></script>

    @include('sweet::alert')

    @yield('scripts')
</body>
</html>
