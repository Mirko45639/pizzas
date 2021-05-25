@extends('layouts.base')
@section('content')
<div class="container" ng-app="pedido" ng-controller="controlEditarPedido">
    <div class="row">

        <div class="col-lg-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 text-muted text-bold">Agregar Pedido</h1>
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
                                <div class="container-fluid" ng-switch="vista">
                                    <div class="container" ng-switch-when="parte1">
                                        <form class="user" ng-submit="paso2()" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                
                                                    <h4 class="w-100 text-center" >cliente</h4>
                                                    <div class="form-group row">
                                                        <input type="text" ng-model="cliente.nombres" name="nombres" class="form-control form-control-user" placeholder="Nombres">
                                                    </div>
                                                    <div class="form-group row">
                                                        <input type="text" ng-model="cliente.apellidos" name="apellidos" class="form-control form-control-user" placeholder="Apellidos">
                                                    </div>
                                                    <div class="form-group row">
                                                        <input type="text" ng-model="cliente.dni" name="dni" class="form-control form-control-user" placeholder="Dni">
                                                    </div>
                                                    <div class="form-group row">
                                                        <input type="text" ng-model="cliente.direccion" name="direccion" class="form-control form-control-user" placeholder="direccion">
                                                    </div>
                                                    <div class="form-group row">
                                                        <input type="text" ng-model="cliente.telefono" name="direccion" class="form-control form-control-user" placeholder="Telefono">
                                                    </div>
                                                    <div class="form-group row">
                                                        <input type="text" name="correo" ng-model="cliente.correo" class="form-control form-control-user" placeholder="Correo">
                                                    </div>
                                                    <div class="form-group row text-center">
                                                    <h6 class="w-100 text-center">HORA DE PEDIDO</h6>
                                                      
                                                      </div>
                                                    <div class="form-group row">
                                                        <input type="time" name="correo" ng-model="cliente.hora" class="form-control form-control-user" placeholder="hora de pedido">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="w-100 text-center">productos</h4>
                                                    <div class="row" style="height: 370px; overflow:scroll;">
                                                        <div class="col-md-6 pt-1" ng-repeat="producto  in productos track by $index">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <img src="/storage/@{{producto.foto}}" class="card-img-top" style="width: 100%; max-height:80px;object-fit:cover" alt="">
                                                                    <input type="checkbox" ng-model="producto.selected" name="producto@{{$index}}" style="position: absolute; top:10px;right:10px;z-index:50;">
                                                                    <p class="w-100 text-center pt-2">@{{producto.nombre}}</p>
                                                                    <h5 class="w-100 text-center">S/.  @{{producto.precio}}</h5>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="number" ng-model="producto.unidades" name="producto@{{$index}}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <input type="submit" ng-disabled="!cliente.correo || !cliente.nombres || !cliente.apellidos || !cliente.direccion" class="btn btn-primary btn-user btn-block" value="Siguiente">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="container" ng-switch-when="parte2">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="w-100 text-center text-muted"> Detalles del pedido</h4>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td>Producto</td>
                                                                    <td>Cantidad</td>
                                                                    <td>Precio</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr ng-repeat="selec in selecccionados track by $index">
                                                                    <td>@{{selec.nombre}}</td>
                                                                    <td>@{{selec.unidades}}</td>
                                                                    <td>S/. @{{selec.precio}}</td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                            <td></td>
                                                            <td>Total</td>
                                                            <td>S/ @{{totalpedido}}</td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                        <input type="button" class="btn btn-block btn-primary" value="Crear Pedido" ng-click="EditarPedido()" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/angular.min.js')}}"></script>
<script src="{{asset('js/pedido.js')}}"></script>
@endsection