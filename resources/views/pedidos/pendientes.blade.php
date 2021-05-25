@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="container">
      
    </div><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedidos Pedientes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <!--      id	titulo	nro_sesiones	precio -->
                        <tr>
                            <th>id</th>
                            <th>fecha</th>
                            <th>hora</th>
                            <th>cliente</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id}}</td>
                            <td>{{$pedido->fecha}}</td>
                            <td>{{$pedido->hora}}</td>
                            <td>{{$pedido->cliente->nombres}}</td>
                            <td>
                                <a href="{{route('pedido.show',['pedido'=>$pedido->id])}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="#" data-toggle="modal" data-target="#cancelar{{$pedido->id}}"><i class="fa fa-times"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#id{{$pedido->id}}">preparado</a>

                            </td>
                            <div class="modal fade" id="id{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('pedido.preparar_pedido',['pedido'=>$pedido->id])}}" method="post">
                                        @csrf
                                        @method('delete') 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cliente : {{$pedido->cliente->nombres ."  ". $pedido->cliente->apellidos}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              Deseas poner pedido  {{$pedido->id}} como preparado ? 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Si, continuar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal fade" id="cancelar{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('pedido.destroy',['pedido'=>$pedido->id])}}" method="post">
                                        @csrf
                                        @method('delete') 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cancelar Pedido</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseas cancelar el pedido {{$pedido->id}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                                <button type="submit" class="btn btn-primary">Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $("#datatables").DataTable();
})
</script>
@endsection