<ul id="sideBar">
    <li><a href="{{ route('dashboard')}}" class="mt-2 fw-bold mb-4 d-flex gap-4 align-items-center {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fa-solid fa-house-chimney"></i> Dashbord</a></li>
    <li><a href="" class="mb-4 fw-bold d-flex gap-4 align-items-center"><i class="fa-solid fa-walkie-talkie"></i> Opération</a></li>
    <li><a href="" class="mb-4 fw-bold d-flex gap-4 align-items-center"><i class="fa-solid fa-calendar-plus"></i> Liste</a></li>
    <li><a href="" class="mb-4 fw-bold d-flex gap-4 align-items-center"><i class="fa-solid fa-shield-halved"></i> Dépense</a></li>
    <li><a href="{{ route('perso.personnel.index')}}" class="fw-bold d-flex gap-4 align-items-center {{ request()->is('personnel/personnel*') || request()->is('fournisseur/fournisseur*') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Acteur</a></li>
</ul>