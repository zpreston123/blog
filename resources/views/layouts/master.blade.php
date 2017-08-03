<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">

    <script>
        window.Laravel = { 'csrfToken': '{{ csrf_token() }}' };
    </script>
</head>
<body>
    @include('layouts.partials.nav')

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
