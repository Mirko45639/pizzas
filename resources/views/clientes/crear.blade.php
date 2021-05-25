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
                                    <h1 class="h4 text-gray-900 mb-4">Crear Cliente</h1>
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
                                <form class="user" action="{{ route('cliente.store')}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <input type="text" name="nombres" class="form-control form-control-user" placeholder="Nombres">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="apellidos" class="form-control form-control-user" placeholder="Apellidos">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="dni" class="form-control form-control-user" placeholder="Dni">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="direccion" class="form-control form-control-user" placeholder="direccion">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="telefono" class="form-control form-control-user" placeholder="Celular">
                                    </div>

                                    <div class="form-group row">
                                        <input type="text" name="correo" class="form-control form-control-user" placeholder="Correo">
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