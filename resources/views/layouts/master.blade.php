<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body id="pjax-container">
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
