@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Arrendatario</h3>
                </div>
                {{-- <div class="col text-right">
                    <a href="{{ url('/propietarios/create') }}" class="btn btn-sm btn-primary">Nuevo tipo usuario</a>
                </div> --}}
            </div>
        </div>

        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
        </div>

        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">C.I.</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arrendatarios as $arrendatario)
                        <tr>
                            <th scope="row">
                                {{ $arrendatario->name }}
                            </th>
                            <td>
                                {{ $arrendatario->email }}
                            </td>
                            <td>
                                {{ $arrendatario->cedula }}
                            </td>
                            <td>
                                {{ $arrendatario->role }}
                            </td>
                            <td>
                                {{ $arrendatario->account_number }}
                            </td>
                            <td>
                                <form action="{{ url('/arrendatarios/' . $arrendatario->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/arrendatarios/' . $arrendatario->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body"> {{ $arrendatarios->links() }} </div>
    </div>
@endsection
