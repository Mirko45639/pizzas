<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact("productos"));
    }
    public function allProducts(){
        $productos=DB::table("producto")
        ->join("categoria","categoria.id","=","producto.categoria_id")
        ->select("producto.*","categoria.denominacion as categoria" )->where("producto.estado","activo")->get();

        
        return response()->json($productos);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.crear', compact("categorias"));
    }

    public function store(Request $request)
    {
        $validacion_datos = $request->validate([
            'nombre' => "required",
            'precio' => "required",
            'descripcion' => "required",
            'foto' => "required",
            'categoria_id' => "required",

        ]);
        $imagen = $request->file("foto");
        $image_path = random_int(1, 10000000) . random_int(9000, 100000) . '.' . $request->file("foto")->getClientOriginalExtension();
        $producto = new Producto();
        $categoria = Categoria::find($request->categoria_id);
        Storage::putFileAs("img/" . $categoria->denominacion, $imagen, $image_path);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->foto = "img/" . $categoria->denominacion . "/" . $image_path;
        $producto->estado = "activo";
        $producto->save();
        return redirect('/admin/producto');
    }


    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.ver', compact('producto'));
    }


    public function edit($id)
    {
        $categorias = Categoria::all();
        $producto = Producto::findOrFail($id);
        return view('productos.editar', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $validacion_datos = $request->validate([
            'nombre' => "required",
            'precio' => "required",
            'descripcion' => "required",
            'categoria_id' => "required",

            "estado" => "required"

        ]);
        $categoria = Categoria::find($request->categoria_id);
        $producto =  Producto::find($id);
        if (isset($request->foto)) {
            $imagen = $request->file("foto");
            $image_path = random_int(1, 10000000) . random_int(9000, 100000) . '.' . $request->file("foto")->getClientOriginalExtension();
           if($producto->foto){
            Storage::delete([$producto->foto]);
            }
            Storage::putFileAs("img/" . $categoria->denominacion, $imagen, $image_path);
            $producto->foto = "img/" . $categoria->denominacion . "/" . $image_path;
        }
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->estado = $request->estado;
        $producto->save();
        return redirect('/admin/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = "baja";
        $producto->save();
        return redirect('/admin/producto');
    }
}
