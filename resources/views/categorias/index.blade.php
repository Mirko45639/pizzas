@extends('layouts.base')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4 text-right"><a href="{{route('categoria.create')}}" class="btn btn-primary">Agregar</a></div>
        </div>
    </div><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categorias</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <!--      id	titulo	nro_sesiones	precio -->
                        <tr>
                            <th>id</th>
                            <th>denominacion</th>
                            <th>Estado</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->denominacion}}</td>
                            <td>{{$categoria->estado}}</td>
                            <td>&nbsp;&nbsp;
                                <a href="{{route('categoria.edit',['categorium'=>$categoria->id])}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="{{route('categoria.show',['categorium'=>$categoria->id])}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="#" data-toggle="modal" data-target="#id{{$categoria->id}}"><i class="fa fa-times"></i></a>
                            </td>
                            <div class="modal fade" id="id{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('categoria.destroy',['categorium'=>$categoria->id])}}" method="post">
                                        @csrf
                                        @method('delete') 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Alumno</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseas eliminar a {{$categoria->denominacion}}
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
<script>
$(document).ready(function(){
    $("#datatables").DataTable();
})
</script>
@endsection