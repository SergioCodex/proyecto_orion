<nav id="sidebar" class="order-last img shadow-sm"
    style="background-image: url({{ asset('storage/images/bg_' . random_int(1,2) . '.jpg') }}); border-left: 2px solid #f3f3f3; z-index:20">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-secondary">
            <i class="fas fa-arrow-right text-white"></i>
        </button>
    </div>
    <div class="mt-3">
        <h1><a href="dashboard/" class="logo">Proyecto Orion <span>Space Admin</span></a></h1>

        @if (Auth::check())

        <ul class="list-unstyled components mb-5 mt-5">
            <li class="active submenu-nav">
                <a href="/"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <div class="mt-3 mb-2">
                <h5 class="ml-4 text-light pb-3" style="border-bottom: 1px solid white">Administración</h5>
            </div>
            <li class="submenu-nav">
                <a href="{{ route('tripulante.index')}}"><span class="fa fa-user mr-3"></span> Tripulantes</a>
            </li>
            <li class="submenu-nav">
                <a href="{{ route('incidencia.index')}}"><span class="fa fa-exclamation-triangle mr-3"></span>
                    Incidencias</a>
            </li>
            <div class="mt-3 mb-2">
                <h5 class="ml-4 text-light pb-3" style="border-bottom: 1px solid white">Gestión</h5>
            </div>
            <li class="submenu-nav">
                <a href="{{ route('alerta.index')}}"><span class="fa fa-sticky-note mr-3"></span> Alertas</a>
            </li>
            <li class="submenu-nav">
                <a href="{{ route('objetivo.index')}}"><span class="fa fa-tasks mr-3"></span> Objetivos</a>
            </li>
            <li class="submenu-nav">
                <a href="{{ route('recurso.index')}}"><span class="fa fa-cogs mr-3"></span> Recursos</a>
            </li>

            <div class="mt-3">
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><span class="fa fa-sign-out-alt mr-3"></span>
                            Logout</a>
                    </li>
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            @else

            <div class="mt-3">
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="{{ route('login') }}"><span class="fa fa-sign-in-alt mr-3"></span> Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"><span class="fa fa-user-plus mr-3"></span> Registrarse</a>
                    </li>
                </ul>
            </div>
            @endif
        </ul>

        <div class="mb-5 px-4">
            <h3 class="h6 mb-3"></h3>
        </div>

    </div>

</nav>