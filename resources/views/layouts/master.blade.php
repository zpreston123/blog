<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @style('/css/app.css')
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

    @script('/js/app.js')
    @yield('scripts')
</body>
</html>
