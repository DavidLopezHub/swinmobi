@extends('layouts.app_front')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('/storage/img_inmuebles/' . $inmueble->img) }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $inmueble->titulo }}</h1>
                        <h2 class="subheading"><b>{{ $inmueble->tipoInmueble->name }}</b></h2>
                        <span class="meta">
                            Publicado por
                            <a href="#!"><b>{{ $inmueble->user->name }}</b></a>
                            en {{ $inmueble->created_at }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p><b>Propietario: </b> {{ $inmueble->user->name }}.</p>
                    <p><b>Zona: </b> {{ $inmueble->zona->name }}.</p>
                    <p><b>Precio: </b> {{ $inmueble->precio }} $us.</p>
                    <p><b>Servicios: </b> {{ $inmueble->servicios }}.</p>
                    <p><b>Superficie: </b> {{ $inmueble->superficie }}.</p>
                    @if ($inmueble->tipo_inmueble_id == 4)
                        <p><b>Latidud y Longitud: </b> {{ $inmueble->latitud }} - {{ $inmueble->longitud }}.</p>
                    @endif
                    <p><b>Contacto: </b> {{ $inmueble->user->phone }}.</p>
                    {{-- esta parte va para alquiler --}}
                    @if ($inmueble->tipo_inmueble_id == 5)
                        <p><b>Numero de habitaciones: </b> {{ $inmueble->nro_habitaciones }}.</p>
                        <p><b>Numero de la Habitacion: </b> {{ $inmueble->nro_habitacion }}.</p>
                        <p><b>Codigo de Cerradura: </b> {{ $inmueble->codigo_cerradura }}.</p>
                        <p><b>Capacidad maxima: </b> {{ $inmueble->capacidad_maxima }}.</p>
                    @endif
                    <a href="#!"><img class="img-fluid" src="{{ asset('/storage/img_inmuebles/' . $inmueble->img) }}"
                            width="100%" alt="..."
                            style="display: block; margin-left: auto; margin-right: auto;" /></a>
                    <span class="caption text-muted">{{ $inmueble->precio }} $us.</span>

                    {{-- Placeholder text by
                        <a href="http://spaceipsum.com/">Space Ipsum</a>
                        &middot; Images by
                        <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a> --}}
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a class="btn btn-primary text-uppercase" href="{{ url('/contratos/' . $inmueble->id) }}">Realizar Contrato</a>
        </div>
    </article>
@endsection
