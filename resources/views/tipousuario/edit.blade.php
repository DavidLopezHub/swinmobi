@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Tipo usuarios</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/tipo_usuario')}}" class="btn btn-sm btn-success">
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
                    <strong>Por favor!!</strong> {{$error}}
                </div>
                @endforeach
            @endif

            <form action="{{url('/tipo_usuario/'.$tipo_usuario->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del tipo usuario</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$tipo_usuario->name)}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" class="form-control" value="{{old('description',$tipo_usuario->description)}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar tipo de usuario</button>
            </form>
        </div>

    </div>
@endsection
