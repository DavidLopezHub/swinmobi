{{-- seccion del navbar mirando desde el resources/views/layouts/panel.blade.php --}}
<h6 class="navbar-heading text-muted">Gestión</h6>
<!-- Navigation -->
<ul class="navbar-nav">
    <li class="nav-item  active ">
        <a class="nav-link  active " href="#">
            <i class="ni ni-tv-2 text-danger"></i> Dashboard
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link " href="#">
            <i class="ni ni-planet text-blue"></i>Propiedades
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link " href="{{url('/inmuebles')}}">
            <i class="ni ni-pin-3 text-orange"></i> Mis Inmuebles
        </a>
    </li>
    @if (auth()->user()->role=="Admin")

        <li class="nav-item">
            <a class="nav-link " href="{{url('/propietarios')}}">
                <i class="fas fa-user-alt text-danger"></i> Propietarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/arrendatarios')}}">
                <i class="fas fa-user-alt text-info"></i> Arrendatarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/clientes')}}">
                <i class="fas fa-user-alt text-success"></i> Clientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/zonas')}}">
                <i class="ni ni-key-25 text-info"></i> Zonas
            </a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/tipo_inmuebles')}}">
                <i class="fas fa-home text-blue"></i> Tipo Inmuebles
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
            @csrf
        </form>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="{{url('/contrato/ventascompra')}}">
            <i class="ni ni-spaceship"></i> Compras/Ventas jeje
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-palette"></i> Compras
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{url('/alquileres/lista')}}">
            <i class="ni ni-ui-04"></i> Alquileres
        </a>
    </li>
</ul>
