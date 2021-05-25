<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact("usuarios"));
    }

    public function create()
    {
        return view('usuarios.crear');
    }


    public function store(Request $request)
    {
        $validacion_datos = $request->validate([
            'name' => "required",
            'email' => "required",
            'password' => "required",
            "rol" => "required",
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $contra = Hash::make($request->password);
        $user->password = $contra;
        $user->rol = $request->rol;
        $user->estado = "activo";
        $user->save();
        return redirect('/admin/usuario');
    }


    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.ver', compact('usuario'));
    }


    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.editar', compact('usuario'));
    }


    public function update(Request $request, $id)
    {
        $validacion_datos = $request->validate([
            'name' => "required",
            'email' => "required",
            "rol" => "required",
            "estado" => "required",
        ]);

        $user = User::findOrFail($id);
        if (isset($request->password)) {
            if ($request->password != "") {
                $contra = Hash::make($request->password);
                $user->password = $contra;
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol = $request->rol;
        $user->estado = $request->estado;
        $user->save();
        return redirect('/admin/usuario');
    }


    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->estado = "baja";
        $usuario->save();
        return redirect('/admin/usuario');
    }
}
