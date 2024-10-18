<nav class="navbar navbar-light p-2">
    <div>
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{$name}}</a>
        <a href="" class="navbar-brand">@section('title')</a>
    </div>
    <div id="mainNav" class="p-2">
        @auth
            <a class="nav-link m-0 p-0" href="">Ajouter utilisateur</a>
            <a class="nav-link m-0 p-0" href="">Editer Profil</a>
            <a class="nav-link m-0 p-0" href="">Changer Mot de passe</a>
            <a class="nav-link m-0 p-0" href="">Donner privillège</a>
            <form action="{{ route('logout') }}" method="post">
                @method('post')
                @csrf 
                <button id="deconnect" class="nav-link text-danger"> Se déconnecter</button>
            </form>
        @endauth
    </div>
    @auth
    <div class="d-flex gap-2">
        <div class="search-container d-flex align-items-center">
            <i class="fas fa-search search-icon"></i>
            <input type="search" class="search-input" placeholder="Entrer votre recherche ici" />
        </div>
        <a href="" id="pamaeter" class="bg-light"><i class="fa-solid fa-gear"></i></a>
        <div class="d-flex">
            <a id="lightMode" href=""><i class="fa-regular fa-sun"></i></a>
            <a id="darkMode" href=""><i class="fa-solid fa-moon"></i></a>
        </div>
        <img id="imgProfil" class="menuToggle" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="">
    </div>
    @endauth
</nav>