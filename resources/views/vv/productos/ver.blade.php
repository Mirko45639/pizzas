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
                                    <h1 class="h4 text-gray-900 mb-4">Detalles Producto</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <input type="text" name="nombre" disabled value="{{$producto->nombre}}" class="form-control form-control-user"  placeholder="Nombre">
                                    </div>
                                    <div class="form-group row">
                                        <input type="number" name="precio"  disabled value="{{$producto->precio}}" class="form-control form-control-user"  placeholder="Apellidos">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="precio" disabled value="{{$producto->categoria->denominacion}}" class="form-control form-control-user"  placeholder="Apellidos">
                                    </div>
                                   
                                  
                                    <div class="form-group row">
                                    <textarea name="descripcion" disabled class="form-control" id="" cols="30" rows="10">
                                        {{$producto->descripcion}}
                                    </textarea>
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" disabled name="precio" value="{{$producto->estado}}" class="form-control form-control-user"  placeholder="Apellidos">
                                    </div>
                                  <a class="btn btn-secondary btn-user btn-block" href="{{URL::to('/cliente')}}">Volver</a>
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