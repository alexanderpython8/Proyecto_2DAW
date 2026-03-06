<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Astros;
use Illuminate\View\View;

class AstrosController extends Controller
{
    public function All() : View
    {
        $astros = Astros::orderBy('id', 'asc')->get();
        return view('backend.astros.gestion_astros', compact('astros'));
    }

    public function crear()
    {
        return view('backend.astros.ins_ast_mysqli');
    }

    public function save(Request $request)
    {
        $astros = new Astros();
        $astros->nombre = $request->input('nombre');
        $astros->tipo = $request->input('tipo');
        $astros->historia = $request->input('historia');
        $astros->caracteristicas = $request->input('caracteristicas');
        $astros->precio = $request->input('precio');
        if ($request->hasFile('img')) {
            $ruta = $request->file('img')->store('astros', 'public');
            $astros->img = $ruta;
        }
        $astros->save();

        return redirect()->route('backend.astros.gestion_astros');
    }

    public function editar($id)
    {
        $astros = Astros::findOrFail($id);
        return view('backend.astros.edit_ast_mysqli', compact('astros'));
    }

    public function update(Request $request, $id)
    {
        $astros = Astros::findOrFail($id);
        $datos = $request->all();
        $astros->update($datos);
        return redirect()->route('backend.astros.gestion_astros');
    }

    public function delete($id)
    {
        $astros = Astros::findOrFail($id);
        $astros->delete();
        return redirect()->route('backend.astros.gestion_astros');
    }
}
