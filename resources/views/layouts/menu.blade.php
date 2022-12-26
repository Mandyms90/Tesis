<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
    <li class="side-menus">
    <a class="nav-link" href="https://www.cursos.disaic.cu/" target="_blank">
        <i class="fas fa-chalkboard-teacher fa-fw" ></i><span>Plataforma Virtual de Entrenamiento</span>
    </a>
</li>
<li class="side-menus {{ Request::is('inf_publicos') ? 'active' : '' }}">
    <a class="nav-link" href="/inf_publicos">
        <i class="fas fa-pencil-alt fa-fw" ></i><span>Informes Públicos</span>
    </a>
</li>
<li class="side-menus {{ Request::is('boletines_pub') ? 'active' : '' }}">
    <a class="nav-link" href="/boletines_pub">
        <i class="fas fa-book fa-fw" ></i><span>Boletines</span>
    </a>
</li>
@if (Auth::user())
<li class="side-menus {{ Request::is('inf_privados') ? 'active' : '' }}">
<a class="nav-link" href="/inf_privados">
    <i class="fas fa-pencil-alt fa-fw" ></i><span>Mis informes</span>
</a>
</li>
@endif



    {{--  <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span> Usuarios </span>
    </a>
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span> Roles </span>
    </a>
    <a class="nav-link" href="/blogs">
        <i class=" fas fa-blog"></i><span> Blogs </span>
    </a>
      --}}

