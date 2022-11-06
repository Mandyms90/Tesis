<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo img-fluid img-thumbnail " src="{{ asset('img/Logo1.png') }}" 
             alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full img-fluid img-thumbnail" src="{{ asset('img/Logo (Inicial).png') }}"  alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu_ini')
    </ul>
</aside>
