@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de contratos realizados</h3>
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
                        <th scope="col">Superficie</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Comprador</th>
                        <th scope="col">Fecha de Compra</th>
                        {{-- <th scope="col">Estado</th> --}}
                        {{-- <th scope="col">Imagen</th> --}}
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tproperty">
                    {{-- @foreach ($inmuebles as $inmueble)
                        <tr id="">
                            <th scope="row">{{ $inmueble->user->name }}</th>
                            <td>{{ $inmueble->titulo }}</td>
                            <td>{{ $inmueble->precio }}</td>
                            <td>{{ $inmueble->tipoInmueble->name }}</td>
                            <td>
                                <a href="{{ url('/inmuebles/' . $inmueble->id . '/edit') }}"
                                    class="btn btn-sm btn-danger">PDF</a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
    <script  src="{{asset('./../js/truffle-contract.js')}}"></script>
    {{-- C:\laragon\www\proysw\node_modules\@truffle\contract\browser-dist\truffle-contract.min.js --}}

    <script  src="{{ asset('./../js/app.js') }}"></script>
    {{-- <script  src="{{ asset('./../js/tableproperty.js') }}"></script> --}}
@endsection
