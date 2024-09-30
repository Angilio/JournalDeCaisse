<nav class="navbar navbar-light p-2">
    <div>
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{$name}}</a>
        <a href="" class="navbar-brand"> @php   @endphp </a>
    </div>
    <div id="mainNav" class="p-2">
        @auth
            <a class="nav-link m-0 p-0" href="{{ route('registration') }}">Ajouter utilisateur</a>
            <a class="nav-link m-0 p-0" href="">Editer Profil</a>
            <a class="nav-link m-0 p-0" href="">Changer Mot de passe</a>
            <a class="nav-link m-0 p-0" href="">Donner privillège</a>
            <form action="{{ route('logout') }}" method="post">
                @method('delete')
                @csrf 
                <button id="deconnect" class="nav-link mt-1 text-white bg-danger p-1">Se déconnecter</button>
            </form>
        @endauth
    </div>
    @auth
     <img id="imgProfil" class="menuToggle" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="">
    @endauth
</nav>