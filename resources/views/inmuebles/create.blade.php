@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Inmueble</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/inmuebles') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"> </i>
                        Regresar
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por favor!!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="{{ url('/inmuebles') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <Label><b>Tipo Inmueble</b> </Label>
                    @foreach ($tipo_inmuebles as $tipo_inmueble)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_inmueble" value="{{$tipo_inmueble->id}}" id="flexRadioDefault"   {{ $tipo_inmueble->name=="Propiedad Particular" ? 'checked' : '' }} onclick="{{ $tipo_inmueble->name=="Propiedad Particular" ? 'ocultar();' : 'mostrar();' }}">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{$tipo_inmueble->name}}
                            </label>
                        </div>
                    @endforeach
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="0"
                            id="flexRadioDefault1" onclick="ocultar();">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Propiedad particular
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="1"
                            id="flexRadioDefault2" onclick="mostrar();">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Alojamiento/residencial
                        </label>
                    </div> --}}
                </div>
                <div class="form-group" id="titulo">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
                </div>
                <div class="form-group" id="precio">
                    <label for="precio">precio</label>
                    <input type="text" name="precio" class="form-control" value="{{ old('precio') }}" required>
                </div>
                <div class="form-group" id="servicios">
                    <label for="servicios">Servicios</label>
                    <input type="text" name="servicios" class="form-control" value="{{ old('servicios') }}">
                </div>
                <div class="form-group" id="superficie">
                    <label for="superficie">superficie</label>
                    <input type="text" name="superficie" class="form-control" value="{{ old('superficie') }}">
                </div>
                <div class="form-group" id="latitud">
                    <label for="latitud">Latitud</label>
                    <input type="text" name="latitud" class="form-control" value="{{ old('latitud') }}">
                </div>
                <div class="form-group" id="longitud">
                    <label for="longitud">Longitud</label>
                    <input type="text" name="longitud" class="form-control" value="{{ old('longitud') }}">
                </div>
                <div class="form-group" id="img">
                    <label for="img">Imagen</label>
                    <input type="file" name="img" class="form-control-file" id="img" value="{{ old('img') }}" accept="image/*">
                </div>
                <div class="form-group" id="nro_habitaciones" style="display: none">
                    <label for="nro_habitaciones">Numero de Habitaciones</label>
                    <input type="number" name="nro_habitaciones" class="form-control"
                        value="{{ old('nro_habitaciones') }}">
                </div>
                <div class="form-group" id="codigo_cerradura" style="display: none">
                    <label for="codigo_cerradura">Codigo de Cerradura</label>
                    <input type="text" name="codigo_cerradura" class="form-control"
                        value="{{ old('codigo_cerradura') }}">
                </div>
                {{-- <div class="form-group" id="estado_cerradura" style="display: none">
                    <label for="estado_cerradura">estado cerradura</label>
                    <input type="text" name="estado_cerradura" class="form-control"
                        value="{{ old('estado_cerradura') }}">
                </div>
                <div class="form-group" id="estado_habitacion" style="display: none">
                    <label for="estado_habitacion">Estado Habitacion</label>
                    <input type="text" name="estado_habitacion" class="form-control"
                        value="{{ old('estado_habitacion') }}">
                </div> --}}
                <div class="form-group" id="capacidad_maxima" style="display: none">
                    <label for="capacidad_maxima">Capacidad maxima</label>
                    <input type="number" name="capacidad_maxima" class="form-control"
                        value="{{ old('capacidad_maxima') }}">
                </div>
                <div class="form-group" id="nro_habitacion" style="display: none">
                    <label for="nro_habitacion">Numero de Habitacion</label>
                    <input type="number" name="nro_habitacion" class="form-control"
                        value="{{ old('nro_habitacion') }}">
                </div>
                <div class="form-group">
                    <label for="zonas">Zonas</label>
                    <select name="zonas[]" class="form-control selectpicker" title="Seleccionar Zona" id="zonas"
                        data-style="btn-primary" required>
                        @foreach ($zonas as $zona)
                            <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" hidden>
                    <label for="tipo_inmuebles">tipo inmuebles</label>
                    <select name="tipo_inmuebles[]" class="form-control selectpicker" title="Seleccionar tipo  inmueble"
                        id="tipo_inmuebles" data-style="btn-primary" required>
                        @foreach ($tipo_inmuebles as $tipo_inmueble)
                            <option value="{{ $tipo_inmueble->id }}">{{ $tipo_inmueble->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear Inmueble</button>
            </form>
        </div>
    </div>


@endsection

@section('script')
    <script>
        function ocultar() {
            // document.getElementById('estado_cerradura').style.display = 'none';
            document.getElementById('nro_habitaciones').style.display = 'none';
            document.getElementById('codigo_cerradura').style.display = 'none';
            // document.getElementById('estado_habitacion').style.display = 'none';
            document.getElementById('capacidad_maxima').style.display = 'none';
            document.getElementById('nro_habitacion').style.display = 'none';
            document.getElementById('longitud').style.display = 'block';
            document.getElementById('latitud').style.display = 'block';
        }

        function mostrar() {
            // document.getElementById('estado_cerradura').style.display = 'block';
            document.getElementById('codigo_cerradura').style.display = 'block';
            document.getElementById('nro_habitaciones').style.display = 'block';
            // document.getElementById('estado_habitacion').style.display = 'block';
            document.getElementById('capacidad_maxima').style.display = 'block';
            document.getElementById('nro_habitacion').style.display = 'block';
            document.getElementById('latitud').style.display = 'none';
            document.getElementById('longitud').style.display = 'none';
        }
    </script>
@endsection
