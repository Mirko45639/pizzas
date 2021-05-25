@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="container-fluid">
                                    <div class="container">
                                        <form class="user" id="pedido" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-3">N°</div>
                                                                <div class="col-md-9">00{{$pedido->id}}</div>
                                                                <div class="col-md-3">Hora</div>
                                                                
                                                                <div class="col-md-9">{{$pedido->hora}}</div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-3">Fecha</div>
                                                                <div class="col-md-9">{{date('d/m/Y',strtotime($pedido->fecha))}}</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <h5 class="w-100 text-left">cliente</h5>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <div class="col-md-3">Nombres</div>
                                                        <div class="col-md-9">
                                                            : {{$pedido->cliente->nombres}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-3">Apellidos</div>
                                                        <div class="col-md-9">

                                                            : {{$pedido->cliente->apellidos}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-3">Dni</div>
                                                        <div class="col-md-9">
                                                            : {{$pedido->cliente->dni}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-3">Direccion</div>
                                                        <div class="col-md-9">
                                                            : {{$pedido->cliente->direccion}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <div class="col-md-3">Correo</div>
                                                        <div class="col-md-9">
                                                            : {{$pedido->cliente->correo}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="w-100 text-left">productos</h5>
                                                    <hr>
                                                    <table class="table">
                                                        <thead class="bg-secondary text-white">
                                                            <tr>
                                                                <td>Id</td>
                                                                <td>Nombre</td>
                                                                <td>Precio</td>
                                                                <td>Cantidad</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($detalles as $detalle)
                                                            <tr>
                                                                <td>
                                                                    {{ $detalle->id}}
                                                                </td>
                                                                <td>
                                                                    {{ $detalle->producto->nombre}}
                                                                </td>
                                                                <td>
                                                                    S/ {{$detalle->precio}}
                                                                </td>
                                                                <td>
                                                                    {{$detalle->cantidad}}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Total</td>
                                                            <td>S/ {{$total}}</td>
                                                            </tr>
                                                        </tfoot>

                                                    </table>
                                                </div>

                                            </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                   
                                    </div>
                                    <div class="col-md-4">
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

@endsection