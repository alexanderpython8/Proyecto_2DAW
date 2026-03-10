<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Astros_Usuarios;
use App\Models\Astros;
use App\Models\Usuarios;
use App\Models\Compras;
use App\Http\Requests\AstrosUsuariosRequest;
use Illuminate\View\View;

class AstrosUsuariosController extends Controller
{
    public function All() : View
    {
        $alquiler = Astros_Usuarios::orderBy('id', 'asc')->get();
        $usuarios = Usuarios::orderBy('id', 'asc')->get();
        $astros = Astros::orderBy('id', 'asc')->get();
        return view('backend.alquiler.gestion_alquiler', compact('alquiler', 'usuarios', 'astros'));
    }

    public function crear() : View
    {
        $usuarios = Usuarios::orderBy('nombre', 'asc')->get();
        $astros = Astros::where('estado', 1)->orderBy('nombre', 'asc')->get();

        return view('backend.alquiler.ins_alq_mysqli', compact('usuarios', 'astros'));
    }

    public function save(AstrosUsuariosRequest $request)
    {
        if (Compras::where('astros_id', $request->astros_id)
               ->where('usuarios_id', $request->usuarios_id)
               ->exists()) {
            return back()->withErrors(['astros_id' => 'Este usuario es el dueño de ese astro.'])->withInput();
        }   

        $alquiler = new Astros_Usuarios();
        $alquiler->usuarios_id = $request->input('usuarios_id');
        $alquiler->astros_id = $request->input('astros_id');
        $alquiler->fechaInicio = $request->input('fechaInicio');
        $alquiler->fechaFin = $request->input('fechaFin');
        $alquiler->save();

        Astros::where('id', $request->input('astros_id'))
          ->update(['estado' => 2]);

        return redirect()->route('gestion_alq')->with('success', 'Alquiler creado correctamente');
    }

    public function editar($id)
    {
        $alquiler = Astros_Usuarios::findOrFail($id);
        return view('backend.alquiler.edit_alq_mysqli', compact('alquiler'));
    }

    public function update(AstrosUsuariosRequest $request, $id)
    {
        $alquiler = Astros_Usuarios::findOrFail($id);
        $alquiler->update($request->all());
        return redirect()->route('gestion_alq')->with('success', 'Alquiler actualizado correctamente');
    }

    public function delete($id)
    {
        $alquiler = Astros_Usuarios::findOrFail($id);

        Astros::where('id', $compras->astros_id)
          ->update(['estado' => 1]);

        $alquiler->delete();
        return redirect()->route('gestion_alq')->with('success', 'Alquiler eliminado correctamente');
    }
}