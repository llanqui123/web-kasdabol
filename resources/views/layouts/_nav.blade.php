<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        Super Admin
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Inicio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categorias.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Categorias</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clientes.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('productos.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Productos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('proveedors.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('compras.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Compras</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('ventas.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-conf" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-conf">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                            href="{{ route('business.index') }}">Empresa</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-report" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-report">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                            href="{{ route('reportes.dia') }}">Reportes por dia</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('reportes.fecha') }}">Reportes por
                            fecha</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-report1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Predicciones</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-report1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                            href="{{ route('prediccions.index') }}">Empresa</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">{{ __('Cerrar sesion') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</nav>
