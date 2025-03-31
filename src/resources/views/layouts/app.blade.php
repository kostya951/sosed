<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon" />
</head>

<body>
    <div id="app">
        <header>
            @include('layouts.header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('layouts.footer')
        </footer>
    </div>
    <script src="{{ asset('js/bundle.js') }}"></script>
</body>

</html>
