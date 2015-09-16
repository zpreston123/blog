<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    {!! HTML::style('css/all.css') !!}
</head>
<body>
    @include('layouts.partials.nav')

    <div class="container">
        @yield('content')
    </div>


    {!! HTML::script('js/all.js') !!}

    @include('sweet::alert')

    @yield('scripts')
</body>
</html>
