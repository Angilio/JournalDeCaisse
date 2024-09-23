<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
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
        <header>
            @component('layouts.component.navbar')
                @slot('name')
                    <span class="text-primary h1">Cash</span> <span class="text-dark h1">Ledger</span>
                @endslot
            @endcomponent
        </header>
        <section id="">
            @component('layouts.component.sideBar')
                
            @endcomponent
            <div id="adminContainer">    
                @yield('content')
            </div>
        </section>
    </body>
</html>