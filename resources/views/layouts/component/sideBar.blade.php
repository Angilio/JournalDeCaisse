<ul id="sideBar">
    <li><a href="{{route('entre.entre.index')}}" class="mt-2 fw-bold mb-4 d-flex gap-4 align-items-center @if(request()->route()->getName() == 'dashboard') active @endif" ><i class="fa-solid fa-house-chimney"></i> Dashbord</a></li>
    <li><a href="{{route('operation.index')}}" class="mb-4 fw-bold d-flex gap-4 align-items-center @if(request()->route()->getName() == 'operation') active @endif"><i class="fa-solid fa-walkie-talkie"></i> Opération</a></li>
    <li><a href=" " class="mb-4 fw-bold d-flex gap-4 align-items-center"><i class="fa-solid fa-calendar-plus"></i> Liste</a></li>
    <li><a href=" " class="mb-4 fw-bold d-flex gap-4 align-items-center"><i class="fa-solid fa-shield-halved"></i> Dépense</a></li>
    <li><a href="{{ route('personel.personel.index') }}" class="fw-bold d-flex gap-4 align-items-center"><i class="fa-solid fa-users"></i> Acteur</a></li>
</ul>