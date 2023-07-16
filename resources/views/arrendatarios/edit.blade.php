@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar perfil:</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/arrendatarios')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por Favor!!</strong> {{$error}}
                    </div>
                @endforeach
            @endif
            <form action="{{url('/arrendatarios/'.$arrendatario->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre del arrendatario</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$arrendatario->name)}}">
                </div>

                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text" name="email" class="form-control" value="{{old('email',$arrendatario->email)}}">
                </div>
                <div class="form-group">
                    <label for="name">Contraseña</label>
                    <input type="text" name="password" class="form-control">
                    <small class="text-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        Solo llena el campo si desea cambiar la contraseña!
                    </small>
                </div>
                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <input type="text" name="cedula" class="form-control"value="{{old('cedula',$arrendatario->cedula)}}">
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" class="form-control"value="{{old('address',$arrendatario->address)}}">
                </div>
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" name="phone" class="form-control"value="{{old('phone',$arrendatario->phone)}}">
                </div>
                <div class="form-group">
                    <label for="account_number">Numero de Cuenta</label>
                    <input type="text" name="account_number" class="form-control"value="{{old('account_number',$arrendatario->account_number)}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary" >Guardar arrendatario</button>
            </form>
        </div>
    </div>
@endsection
