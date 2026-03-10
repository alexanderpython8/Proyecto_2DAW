<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuariosRequest;
use App\Models\Usuarios;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

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

    public function save(UsuariosRequest $request)
    {
        $usuarios = new Usuarios();
        $usuarios->nombre = $request->input('nombre');
        $usuarios->email = $request->input('email');
        $usuarios->password = Hash::make($request->input('password'));
        $usuarios->rol = $request->input('rol');
        $usuarios->save();

        return redirect()->route('gestion_usr')->with('success', 'Usuario actualizado correctamente');;
    }

    public function editar($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        return view('backend.usuarios.edit_usr_mysqli', compact('usuarios'));
    }

    public function update(UsuariosRequest $request, $id)
    {
        $usuarios = Usuarios::findOrFail($id);
        $datos = $request->all();
        $usuarios->update($datos);
        return redirect()->route('gestion_usr')->with('success', 'Usuario actualizado correctamente');;
    }

    public function delete($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        $usuarios->update(['rol' => 3]);
        return redirect()->route('gestion_usr')->with('success', 'Usuario suspendido correctamente');;
    }
}
