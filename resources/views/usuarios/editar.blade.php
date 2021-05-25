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
                                <form class="user" action="{{ route('usuario.update',['usuario'=>$usuario->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <input type="text" name="name" value="{{$usuario->name}}" class="form-control form-control-user"  placeholder="Nombres">
                                    </div>
                                    <div class="form-group row">
                                        <input type="email" name="email" value="{{$usuario->email}}" class="form-control form-control-user"  placeholder="Email">
                                    </div>

                                    <div class="form-group row">
                                        <input type="password" name="password" value="" class="form-control form-control-user"  placeholder="Contraseña (opcional)">
                                    </div>
                                    <div class="form-group row">
                                    <select name="estado" value="{{$usuario->estado}}" class="form-control" placeholder="estado">
                                        <option value="activo">Activo</option>
                                        <option value="baja">Baja</option>
                                    </select>
                                    </div>
                                    <div class="form-group row">
                                        <select name="rol"  class="form-control" value="{{$usuario->rol}}" placeholder="Rol">
                                            <option value="administrador">Administrador</option>
                                            <option value="chef">Baja</option>
                                            <option value="repartidor">Repartidor</option>
                                        </select>
                                        </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Actualizar"><br>
                                    <a class="btn btn-secondary btn-user btn-block" href="{{URL::to('/usuario')}}">Cancelar</a>
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