@extends('layouts.app_front')

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Publicita tus Inmuebles!</h1>
                        <span class="subheading">Ofrecemos trato seguro con los clientes</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($inmuebles as $inmueble)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{url('/'.$inmueble->id)}}">
                            <h2 class="post-title">{{ $inmueble->tipoInmueble->name }}</h2>
                            <h3 class="post-subtitle">{{$inmueble->titulo}}</h3>
                        </a>
                        <div class="card">
                            <div class="card-img">
                                <img class="img-thumbnail" src="{{ asset('/storage/img_inmuebles/'.$inmueble->img) }}" alt="{{$inmueble->img}}" width="60%" style="display: block; margin-left: auto; margin-right: auto;">
                            </div>
                        </div>
                        <p class="post-meta">
                            Publicado por
                            <a href="#!"><b>{{$inmueble->user->name}} </b></a>
                            on <b>{{$inmueble->created_at}} </b>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="card-body"> {{$inmuebles->links()}} </div>
                {{-- <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
