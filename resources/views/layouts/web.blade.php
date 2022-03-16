<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Erasmus Connect</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('partials.navbar')
        <main class="main-container">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>
</html>
<style lang="scss" scoped>
    html {
        width: 100%;
        height: auto;
    }
    body {
        display: flex;
        width: 100%;
        height: auto;
    }
    #app {
        display: flex;
        width: 100%;
        flex-direction: column;
        height: 100%;
    }
    p {
        text-align: justify;
    }
</style>