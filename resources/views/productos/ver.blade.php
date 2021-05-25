@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-8">
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
                                  <a class="btn btn-secondary btn-user btn-block" href="{{URL::to('/producto')}}">Volver</a>
                                </form>
                                <br><br><br>
                           </div>
                        </div>
                        <div class="col-lg-4" style="padding-top: 20%;">
                        <img  src="{{asset('storage/' . $producto->foto)}}" style="width: 80%; margin:auto" alt="algo xd">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
        
    </div>
</div>
@endsection