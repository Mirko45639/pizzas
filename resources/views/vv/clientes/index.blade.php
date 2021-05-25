@extends('layouts.base')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4 text-right"><a href="{{route('cliente.create')}}" class="btn btn-primary">Agregar</a></div>
        </div>
    </div><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <!--      id	titulo	nro_sesiones	precio -->
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nombres}}</td>
                            <td>{{$cliente->apellidos}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>{{$cliente->correo}}</td>
                            <td>{{$cliente->estado}}</td>
                            <td>&nbsp;&nbsp;
                                <a href="{{route('cliente.edit',['cliente'=>$cliente->id])}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="{{route('cliente.show',['cliente'=>$cliente->id])}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="#" data-toggle="modal" data-target="#id{{$cliente->id}}"><i class="fa fa-times"></i></a>
                            </td>
                            <div class="modal fade" id="id{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('cliente.destroy',['cliente'=>$cliente->id])}}" method="post">
                                        @csrf
                                        @method('delete') 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseas eliminar  {{$cliente->nombres . ' ' . $cliente->apellidos}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Eliminar</button>
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

@endsection