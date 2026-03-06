<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Http\View;

class UsuariosController extends Controller
{
    public function All() : View
    {
        $usuarios = Usuarios::orderBy('id', 'asc')->get();
        return view('backend.usuarios.gestion_usuarios', compact('usuarios'));
    }

    public function crear()
    {
        return view('backend.usuarios.ins_usr_mysqli');
    }

    public function save(Request $request)
    {
        $usuarios = new Usuarios();
        $usuarios->nombre = $request->input('nombre');
        $usuarios->email = $request->input('email');
        $usuarios->password = $request->input('password');
        $usuarios->rol = $request->input('rol');
        $usuarios->save();

        return redirect()->route('backend.usuarios.gestion_usuario');
    }

    public function editar($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        return view('backend.usuarios.edit_usr_mysqli', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {
        $usuarios = Usuarios::findOrFail($id);
        $datos = $request->all();
        $usuarios->update($datos);
        return redirect()->route('backend.usuarios.gestion_usuario');
    }

    public function delete($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        $usuarios->delete();
        return redirect()->route('backend.usuarios.gestion_usuario');
    }
}
