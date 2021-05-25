<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact("categorias"));
    }


    public function create()
    {
        return view('categorias.crear');
    }

    public function store(Request $request)
    {
        $validacion_datos = $request->validate([
            'denominacion' => "required",

        ]);
        $categoria = new Categoria();
        $categoria->denominacion = $request->denominacion;
        $categoria->estado = "activo";
        $categoria->save();
        return redirect('/admin/categoria');
    }


    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.ver', compact('categoria'));
    }


    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.editar', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $validacion_datos = $request->validate([
            'denominacion' => "required",
            "estado" => "required",

        ]);
        $categoria = Categoria::findOrFail($id);
        $categoria->denominacion = $request->denominacion;
        $categoria->estado = $request->estado;
        $categoria->save();
        return redirect('/admin/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->estado = "baja";
        $categoria->save();
        return redirect('/admin/categoria');
    }
}
