<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('assets/images/logoMD.png')}}" type="image/x-icon">
        <title>@yield('title', env('APP_NAME'))</title>
        <link rel="stylesheet" href={{asset('assets/normalize.css')}}>
        <link rel="stylesheet" href={{asset('assets/bootstrap.min.css')}}>
        <script src={{asset('assets/bootstrap.bundle.min.js')}}></script>
        <script src={{asset('assets/jquery-3.4.1.min.js')}}></script>
        <script src={{asset('assets/menu.js')}}></script>
        <script src={{asset('assets/chart.min.js')}}></script>
        <script src={{asset('assets/fontawesome.min.js')}} ></script>
        <link rel="stylesheet" href="{{asset('assets/fontawesome.min.css')}}">
        <link rel="stylesheet" href={{asset('assets/app.css')}}>
    </head>
    <body >
        @auth
            <header class="bg-light">
                @component('layouts.component.navbar')
                    @slot('name')
                        <img id="logoCaisse" src="{{ asset('assets/images/logo.png')}}" alt="" height="60px">
                    @endslot
                @endcomponent
            </header>
        @endauth
        <section>
            <div id="pageContent">    
                @yield('content')
            </div>
        </section>
    </body>
</html>