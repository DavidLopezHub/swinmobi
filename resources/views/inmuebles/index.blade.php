@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">inmuebles</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/inmuebles/create') }}" class="btn btn-sm btn-primary">Nueva inmueble</a>
                </div>
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
                        <th scope="col">Propietario</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tipo Inmueble</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inmuebles as $inmueble)
                        <tr>
                            <th scope="row">
                                {{ $inmueble->user->name }}
                            </th>
                            <td>
                                {{ $inmueble->titulo }}
                            </td>
                            <td>
                                {{ $inmueble->precio }}
                            </td>
                            <td>
                                {{ $inmueble->tipoInmueble->name }}
                            </td>
                            <td>
                                <img src="{{ asset('/storage/img_inmuebles/'.$inmueble->img) }}" alt="{{$inmueble->img}}" width="150">
                            </td>
                            <td>
                                <form action="{{ url('/inmuebles/' . $inmueble->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/inmuebles/' . $inmueble->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
