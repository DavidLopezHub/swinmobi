<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <!-- Form -->
        <a href="{{ route('login') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            <i class="ni ni-key-25"></i>
            Log in
        </a>
        <!-- User -->
        @if (Route::has('register'))
            {{-- Register --}}
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-circle-08"></i>
                        Registrate
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="{{url('/propietarios/create')}}" class="dropdown-item">
                            <span>Pripietario</span>
                        </a>
                        <a href="{{url('/arrendatarios/create')}}" class="dropdown-item">
                            <span>Arrendatario</span>
                        </a>
                        <a href="{{url('/clientes/create')}}" class="dropdown-item">
                            <span>Cliente</span>
                        </a>
                    </div>
                </li>
            </ul>
        @endif
    </div>
</nav>
