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
                                    <h1 class="h4 text-gray-900 mb-4">Crear producto</h1>
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
                                <form class="user" action="{{ route('producto.store')}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <input type="text" name="nombre" class="form-control form-control-user" placeholder="Nombre">
                                    </div>
                                    <div class="form-group row">
                                        <input type="number" name="precio" class="form-control form-control-user" placeholder="Precio">
                                    </div><div class="form-group row">
                                    <select name="categoria_id" class="form-control" id="">
                                        @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->denominacion}}</option>
                                        @endforeach
                                    </select></div>
                                    <div class="form-group row">
                                    <textarea name="descripcion" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                   
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Agregar producto">
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