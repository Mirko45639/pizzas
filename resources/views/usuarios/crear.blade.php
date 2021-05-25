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
                                    <h1 class="h4 text-gray-900 mb-4">Crear usuarios</h1>
                                </div>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form class="user" action="{{ route('usuario.store')}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <input type="text" name="name" class="form-control form-control-user" placeholder="Nombres">
                                    </div>
                                    <div class="form-group row">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Correo">
                                    </div>
                                    <div class="form-group row">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group row">
                                        <select name="rol"  class="form-control" placeholder="Rol">
                                            <option value="administrador">Administrador</option>
                                            <option value="chef">Cocinero</option>
                                            <option value="repartidor">Repartidor</option>
                                        </select>
                                        </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Agregar cliente">
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