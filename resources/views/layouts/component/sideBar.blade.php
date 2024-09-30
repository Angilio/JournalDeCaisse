<ul class="" id="sideBar">
    <li><a href="{{route('dashboard')}}"  class=" mb-1 @if(request()->route()->getName() == 'dashboard') active @endif mb-1" > Dashbord</a></li>
    <li><a href="{{route('operation.index')}}" class=" @if(request()->route()->getName() == 'operation') active @endif mb-1"> Opération</a></li>
    <li><a href=" " class="mb-1"> Liste</a></li>
    <li><a href=" " class="mb-1"> Dépense</a></li>
    <li><a href=" " class="mb-1"> Acteur</a></li>
</ul>