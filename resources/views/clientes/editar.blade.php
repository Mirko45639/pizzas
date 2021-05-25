@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Editar Alumno</h1>
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <form class="user" action="{{ route('cliente.update',['cliente'=>$cliente->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <input type="text" name="nombres" value="{{$cliente->nombres}}" class="form-control form-control-user"  placeholder="Nombres">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="apellidos" value="{{$cliente->apellidos}}" class="form-control form-control-user"  placeholder="Apellidos">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="dni" value="{{$cliente->dni}}" class="form-control form-control-user"  placeholder="Dni">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="correo" value="{{$cliente->correo}}" class="form-control form-control-user"  placeholder="Correo">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="direccion" value="{{$cliente->direccion}}" class="form-control form-control-user"  placeholder="Direccion">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="telefono" value="{{$cliente->telefono}}" class="form-control form-control-user"  placeholder="Telefono">
                                    </div>
                                    <div class="form-group row">
                                    <select name="estado" value="{{$cliente->estado}}" class="form-control" placeholder="estado">
                                        <option value="activo">Activo</option>
                                        <option value="baja">Baja</option>
                                    </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Actualizar"><br>
                                    <a class="btn btn-secondary btn-user btn-block" href="{{URL::to('/cliente')}}">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
@endsection