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
                                    <h1 class="h4 text-gray-900 mb-4">Editar categoria</h1>
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <form class="user" action="{{ route('categoria.update',['categorium'=>$categoria->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <input type="text" name="denominacion" value="{{$categoria->denominacion}}" class="form-control form-control-user"  placeholder="Denominacion">
                                    </div>
                                    <div class="form-group row">
                                        <select name="estado" value="{{$categoria->estado}}" class="form-control" placeholder="estado">
                                            <option value="activo">Activo</option>
                                            <option value="baja">Baja</option>
                                        </select>
                                        </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Actualizar"><br>
                                    <a class="btn btn-secondary btn-user btn-block" href="{{URL::to('/categoria')}}">Cancelar</a>
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