@extends('layouts.form')

@section('title','Registro de Propietario')

@section('content')
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-body px-lg-5 py-lg-5">
                        @if ($errors->any())
                            <div class="text-center text-muted mb-2">
                                <h4>Se encontro el siguiente error</h4>
                            </div>
                            <div class="alert alert-danger mb-4" role="alert">
                                {{ $errors->first() }}
                            </div>
                        @else
                            <div class="text-center text-muted mb-4">
                                <small>Ingrese sus datos..</small>
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ url('/propietarios') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Nombre" type="text" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Correo Electrónico" type="email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Contraseña" type="password" name="password"
                                        required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Repetir Contraseña" type="password"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input id="cedula" class="form-control" placeholder="Cédula de Identidad" type="text"
                                        name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                    <div class="input-group-prepend">
                                        <span class="input-group-text ml-2"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input id="phone" class="form-control col-6" placeholder="Telefono" type="text"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Dirección" type="text"
                                        id="address" name="address" value="{{ old('address') }}" required
                                        autocomplete="address">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-ethereum"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Numero de Cuenta" type="text"
                                        id="account_number" name="account_number" value="{{ old('account_number') }}" required
                                        autocomplete="account_number">
                                </div>
                            </div>
                            <div class="form-group mb-1" hidden>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-users"></i></span>
                                    </div>
                                    <input id="role" class="form-control" type="text"
                                        name="role" value="{{ $role }}" autocomplete="role" autofocus>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Registrarse..</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
