@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de contratos de Alquileres</h3>
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
                        <th scope="col">Direccion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Inquilino</th>
                        <th scope="col">Fecha de alquiler</th>
                        <th scope="col" style="text-align: center">Estado <br> Abierto/Cerrado</th>
                        {{-- <th scope="col">Imagen</th> --}}
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tproperty">
                    @foreach ($alquileres as $alquilere)
                        <tr id="">
                            <th scope="row">{{ $alquilere->inmuebles()->first()->titulo }}</th>
                            <td>{{ $alquilere->inmuebles()->first()->zona->name }}</td>
                            <td>{{ $alquilere->total }}</td>
                            <td>{{ $alquilere->user->name }}</td>
                            <td>{{ $alquilere->inmuebles()->first()->pivot->created_at }}</td>
                            <td style="text-align: center">
                                <form action="{{ url('/alquileres/'.$alquilere->inmuebles()->first()->id) }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $alquilere->inmuebles()->first()->id }}">
                                    <input type="checkbox" name="estado" value="1" onchange="this.form.submit()"
                                        @if ( $alquilere->inmuebles()->first()->estado_cerradura == "Habilitado") checked @endif>
                                    {{-- <button class="btn btn-primary" type="submit">Guardar</button> --}}
                                </form>
                            </td>
                            <td>
                                <a href="{{ url('/pdf/generar-pdf/' . $alquilere->id) }}">
                                    <i class='far fa-file-pdf' style='font-size:40px;color:red'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
    {{-- <script  src="{{asset('./../js/truffle-contract.js')}}"></script> --}}
    {{-- C:\laragon\www\proysw\node_modules\@truffle\contract\browser-dist\truffle-contract.min.js --}}

    {{-- <script  src="{{ asset('./../js/app.js') }}"></script> --}}
    {{-- <script  src="{{ asset('./../js/tableproperty.js') }}"></script> --}}
@endsection
