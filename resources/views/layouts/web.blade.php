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
    <div id="app" style="background-color: #f8f9f9">
        @include('partials.navbar')
        <!-- <main class="main-container"> -->
            @yield('content')
        <!-- </main> -->
        <!-- Lo comento para que no aparezca en páginas como el perfil
        tocará llamar a '<footer-web/>' Al final de cada .vue en el que queramos que aparezca -->
        <!-- @include('partials.footer') -->
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
    /*Para cambiar la barra de desplazamiento*/
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        border-radius: 10px;
        background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: rgb(175, 175, 175);
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #888
    }
</style>