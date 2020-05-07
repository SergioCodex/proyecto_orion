<nav id="sidebar" class="order-last img"
    style="background-image: url({{ asset('storage/images/bg_' . random_int(1,4) . '.jpg') }})">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-secondary">
            <i class="fas fa-arrow-right text-white"></i>
        </button>
    </div>
    <div class="">
        <h1><a href="index.html" class="logo">Proyecto Orion <span>Space Admin</span></a></h1>

        @if (Auth::check())

        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="/"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <li>
                <a href="{{ route('tripulante.index')}}"><span class="fa fa-user mr-3"></span> Tripulantes</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-sticky-note mr-3"></span> Datos</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-cogs mr-3"></span> Recursos</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-paper-plane mr-3"></span> Mensajes</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-exclamation-triangle mr-3"></span> Incidencias</a>
            </li>
        </ul>

        <div class="mb-5 px-4">
            <h3 class="h6 mb-3">Subscribe for newsletter</h3>
            <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                    <div class="icon"><span class="icon-paper-plane"></span></div>
                    <input type="text" class="form-control" placeholder="Enter Email Address">
                </div>
            </form>
        </div>

        @else



        @endif



        @if (Auth::check())
        <div class="bottom-align-text">
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
        <div class="bottom-align-text">
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



    </div>

</nav>