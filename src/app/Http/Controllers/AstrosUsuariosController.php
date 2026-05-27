<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Astros_Usuarios;
use App\Models\Astros;
use App\Models\Usuarios;
use App\Models\Compras;
use App\Models\Pagos;
use App\Http\Requests\AstrosUsuariosRequest;
use Illuminate\View\View;
use Carbon\Carbon;

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
        $usuarios = Usuarios::where('rol', '!=', 3)->orderBy('nombre', 'asc')->get();
        $astros = Astros::where('estado', 1)->orderBy('nombre', 'asc')->get();

        return view('backend.alquiler.ins_alq_mysqli', compact('usuarios', 'astros'));
    }

    public function save(AstrosUsuariosRequest $request)
    {
        if (Compras::where('astros_id', $request->astros_id)
               ->where('usuarios_id', $request->usuarios_id)
               ->exists()) {
            return back()->withErrors(['astros_id' => 'Este usuario es el dueño de ese astro, no puede alquilarlo.'])->withInput();
        }

        $astro = Astros::findOrFail($request->input('astros_id'));

        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $dias = $fechaInicio->diffInDays($fechaFin);

        if ($dias <= 0) {
            return back()->withErrors(['fechaFin' => 'La fecha de fin debe ser posterior a la fecha de inicio.'])->withInput();
        }

        $precioDiario = round($astro->precio / 365, 2);
        $montoTotal = round($precioDiario * $dias, 2);

        $alquiler = new Astros_Usuarios();
        $alquiler->usuarios_id = $request->input('usuarios_id');
        $alquiler->astros_id = $request->input('astros_id');
        $alquiler->fechaInicio = $request->input('fechaInicio');
        $alquiler->fechaFin = $request->input('fechaFin');
        $alquiler->save();

        $astro->update(['estado' => 2]);
        
        Pagos::create([
            'compras_id' => null,
            'astros_usuarios_id' => $alquiler->id,
            'tipo' => 'alquiler',
            'monto' => $montoTotal,
            'dias_alquiler' => $dias,
        ]);

        return redirect()->route('gestion_alq')
            ->with('success', "Alquiler registrado. Pago automático generado: {$dias} días × {$precioDiario} cr/día = {$montoTotal} créditos galácticos.");
    }

    public function editar($id)
    {
        $alquiler = Astros_Usuarios::findOrFail($id);
        $usuarios = Usuarios::orderBy('nombre', 'asc')->get();
        $astros = Astros::orderBy('nombre', 'asc')->get();
        return view('backend.alquiler.edit_alq_mysqli', compact('alquiler', 'usuarios', 'astros'));
    }

    public function update(AstrosUsuariosRequest $request, $id)
    {
        $alquiler = Astros_Usuarios::findOrFail($id);

        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $dias = $fechaInicio->diffInDays($fechaFin);

        if ($dias > 0) {
            $astro = Astros::findOrFail($alquiler->astros_id);
            $precioDiario = round($astro->precio / 365, 2);
            $montoTotal = round($precioDiario * $dias, 2);

            Pagos::where('astros_usuarios_id', $id)->update([
                'monto' => $montoTotal,
                'dias_alquiler' => $dias,
            ]);
        }

        $alquiler->update($request->all());
        return redirect()->route('gestion_alq')->with('success', 'Alquiler y pago actualizados correctamente');
    }

    public function delete($id)
    {
        $alquiler = Astros_Usuarios::findOrFail($id);

        Astros::where('id', $alquiler->astros_id)
            ->update(['estado' => 1]);

        $alquiler->delete();
        return redirect()->route('gestion_alq')->with('success', 'Alquiler eliminado correctamente');
    }
}