<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    </head>
    <body>
        <div id="app">
            @include('layouts.partials.navbar')

            <section class="section">
                <div class="container content">
                    @include('flash::message')
                    @yield('content')
                    <flash-message></flash-message>
                </div>
            </section>

            @include('layouts.partials.footer')
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
