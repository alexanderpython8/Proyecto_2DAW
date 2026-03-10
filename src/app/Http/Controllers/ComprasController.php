<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use App\Models\Astros;
use App\Models\Usuarios;
use App\Http\Requests\ComprasRequest;
use Illuminate\View\View;

class ComprasController extends Controller
{
    public function All() : View
    {
        $compras = Compras::orderBy('id', 'asc')->get();
        return view('backend.compra.gestion_compra', compact('compras'));
    }

    public function crear() : View
    {
        $usuarios = Usuarios::orderBy('nombre', 'asc')->get();
        $astros = Astros::where('estado', 0)->orderBy('nombre', 'asc')->get();

        return view('backend.comprar.ins_com_mysqli', compact('usuarios', 'astros'));
    }

    public function save(ComprasRequest $request)
    {
        $compras = new Compras();
        $compras->astros_id = $request->input('astros_id');
        $compras->usuarios_id = $request->input('usuarios_id');
        $compras->save();

        return redirect()->route('gestion_com')->with('success', 'Compra actualizado correctamente');;
    }

    public function editar($id)
    {
        $compras = Usuarios::findOrFail($id);
        return view('backend.usuarios.edit_com_mysqli', compact('compras'));
    }

    public function update(ComprasRequest $request, $id)
    {
        $compras = Compras::findOrFail($id);
        $datos = $request->all();
        $compras->update($datos);
        return redirect()->route('gestion_com')->with('success', 'Compra actualizado correctamente');;
    }

    public function delete($id)
    {
        $compras = Compras::findOrFail($id);
        $compras->delete();
        return redirect()->route('gestion_com')->with('success', 'Compra eliminado correctamente');;
    }
}
