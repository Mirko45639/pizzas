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
                                    <h1 class="h4 text-gray-900 mb-4">Detalles Alumno</h1>
                                </div>
                                <form class="user">
                                <div class="form-group row">
                                        <input type="text" readonly name="tnombre" value="{{$cliente->id}}" class="form-control form-control-user"  placeholder="Nombres">
                                    </div>
                                <div class="form-group row">
                                        <input type="text" readonly name="tnombre" value="{{$cliente->nombre}}" class="form-control form-control-user"  placeholder="Nombres">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" readonly name="tapellidos" value="{{$cliente->apellidos}}" class="form-control form-control-user"  placeholder="Apellidos">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" readonly name="tdni" value="{{$cliente->dni}}" class="form-control form-control-user"  placeholder="Dni">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text"  readonly name="tedad" value="{{$cliente->direccion}}" class="form-control form-control-user"  placeholder="Edad">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text"  readonly name="tedad" value="{{$cliente->correo}}" class="form-control form-control-user"  placeholder="Edad">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text"  readonly name="tedad" value="{{$cliente->estado}}" class="form-control form-control-user"  placeholder="Edad">
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