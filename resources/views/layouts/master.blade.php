<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('layouts.partials.navbar')

    <section class="section">
        <div id="app" class="container content">
            <flash></flash>

            @yield('content')
        </div>
    </section>

    @include('layouts.partials.footer')

    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
