<nav class="navbar navbar-light bg-light p-2">
    <div>
        <img id="logoPrjct" src="{{asset('/assets/images/favicon.png')}}" alt="">
        <a class="navbar-brand h1" href="{{ route('dashboard') }}">{{$name}}</a>
    </div>
    <div id="mainNav" class="bg-light p-2">
        @auth
            <a class="nav-link m-0 p-0" href="{{ route('registration') }}">Créer compte</a>
            <a class="nav-link m-0 p-0" href="">Editer Profil</a>
            <a class="nav-link m-0 p-0" href="{{ route('logout') }}">Déconnexion</a>
        @endauth
    </div>
    @auth
     <img id="imgProfil" class="menuToggle" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="">
    @endauth
</nav>