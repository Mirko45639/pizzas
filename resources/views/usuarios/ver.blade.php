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
                                    <h1 class="h4 text-gray-900 mb-4">Detalles Usaurio</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <input type="text" name="name" value="{{$usuario->name}}" class="form-control form-control-user"  placeholder="Nombres">
                                    </div>
                                    <div class="form-group row">
                                        <input type="email" name="email" value="{{$usuario->email}}" class="form-control form-control-user"  placeholder="Email">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="rol" value="{{$usuario->rol}}" class="form-control form-control-user"  placeholder="Rol">
                                    </div>
                                    <div class="form-group row">
                                        <input type="text" name="estado" value="{{$usuario->estado}}" class="form-control form-control-user"  placeholder="Estado">
                                    </div>
                                  
                                   
                                  <a class="btn btn-secondary btn-user btn-block" href="{{URL::to('/usuario')}}">Volver</a>
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