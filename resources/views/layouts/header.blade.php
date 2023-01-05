<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li class="nav-item">
            <a class="nav-link active" href="/"><i class="fas fa-home fa-fw" ></i><span>Inicio</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/info"><i class="fas fa-info-circle fa-fw" ></i><span>¿Quienes somos?</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contactos"><i class="fas fa-address-book fa-fw" ></i><span>Contactos</span></a>
        </li> 
        @can('administrar')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="fas fa-tools"></i> Administración </a>
                <div class="dropdown-menu">
                    @can('ver-carrucel')
                        <a class="dropdown-item" href="/carrucels"><i class="fas fa-images fa-fw" ></i><span> Carrucel de Bienvenida </span> </a>
                    @endcan
                    @can('ver-noticia')
                        <a class="dropdown-item" href="/noticias"><i class="fas fa-newspaper fa-fw" ></i><span> Noticias </span></a>
                    @endcan
                    @can('ver-informe')
                        <a class="dropdown-item" href="/informes"><i class="fas fa-pencil-alt fa-fw" ></i><span> Informes </span></a>
                    @endcan
                    @can('ver-boletin')
                        <a class="dropdown-item" href="/boletines"><i class="fas fa-book fa-fw" ></i><span> Boletines </span></a>
                    @endcan
                    @can('ver-blog')
                        <a class="dropdown-item" href="/blogs"><i class=" fas fa-blog fa-fw"></i><span> Blogs </span></a>                    
                    @endcan
                <div class="dropdown-divider"></div>
                    @can('ver-usuario')
                        <a class="dropdown-item" href="/usuarios"><i class=" fas fa-users fa-fw"></i><span> Usuarios </span></a>
                    @endcan
                    @can('ver-rol')
                        <a class="dropdown-item" href="/roles"><i class=" fas fa-user-lock fa-fw"></i><span> Roles </span></a>
                    @endcan
                </div>
            </li>         
        @endcan
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    @if(\Illuminate\Support\Facades\Auth::user())
            <li class="dropdown">
            <a href="#" data-toggle="dropdown" 
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                 <i class="fas fa-atom rounded-circle mr-1 thumbnail-rounded user-thumbnail"></i>
                <div class="d-sm-none d-lg-inline-block">
                    Hi, {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Welcome, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                    <i class="fa fa-user"></i>Edit Profile</a>
                <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                            class="fa fa-lock"> </i>Change Password</a>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
               
                <div class="d-sm-none d-lg-inline-block"><i class="fas fa-address-card"></i> {{ __('Hello') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{--  <div class="dropdown-title">{{ __('messages.common.login') }}
                    / {{ __('messages.common.register') }}</div>  --}}
                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> {{ __('Register') }}
                </a>
            </div>
        </li>
    @endif
</ul>

