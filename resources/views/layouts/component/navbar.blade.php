<nav class="navbar navbar-light bg-light p-2">
    <div>
        <img id="logoPrjct" src="{{asset('/assets/images/favicon.png')}}" alt="">
        <a class="navbar-brand h1" href="{{ route('home') }}">{{$name}}</a>
    </div>
    <div id="mainNav" class="bg-light">
        @auth
            <a class="nav-link text-white btn btn-primary m-2" href="{{ route('registration') }}">Créer compte</a>
            <a class="m-2" href=""><img id="imgProfil" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="" srcset=""></a>
            <a class="nav-link btn btn-danger" href="{{ route('logout') }}">Déconnexion</a>
        @else
            <a class="nav-link " href="">Voir Profil</a>
            <a class="nav-link " href="">Editer Profil</a>
            <a class="nav-link " href="">Déconnexion</a>
        @endauth
    </div>
    <img id="imgProfil" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="" srcset="">
    <!--img id="menuToggle" src="{{ asset('/assets/images/hamburger.svg') }}" alt="Humberger"-->
</nav>