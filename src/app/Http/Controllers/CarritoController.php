<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Astros;
use App\Models\Compras;
use App\Models\Pagos;

class CarritoController extends Controller
{
    public function agregar($id)
    {
        $astro = Astros::findOrFail($id);

        // Solo se puede agregar si está disponible (estado 0)
        if ($astro->estado != 0) {
            return back()->with('error', 'Este astro ya no está disponible.');
        }

        $carrito = session()->get('carrito', []);

        // Evitar duplicados
        if (!isset($carrito[$id])) {
            $carrito[$id] = [
                'id'             => $astro->id,
                'nombre'         => $astro->nombre,
                'precio'         => $astro->precio,
                'img'            => $astro->img,
                'caracteristicas'=> $astro->caracteristicas,
            ];
            session()->put('carrito', $carrito);
        }

        return back()->with('success', '¡Astro añadido al carrito!');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        unset($carrito[$id]);
        session()->put('carrito', $carrito);

        return back()->with('success', 'Astro eliminado del carrito.');
    }

    public function ver()
    {
        $carrito = session()->get('carrito', []);

        // Limpiar del carrito los que ya fueron comprados
        foreach ($carrito as $id => $item) {
            $astro = Astros::find($id);
            if (!$astro || $astro->estado != 0) {
                unset($carrito[$id]);
            }
        }
        session()->put('carrito', $carrito);

        $total = array_sum(array_column($carrito, 'precio'));

        return view('frontend.carrito.carrito', compact('carrito', 'total'));
    }

    public function comprar(Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return back()->with('error', 'El carrito está vacío.');
        }

        $usuario = auth()->user();

        foreach ($carrito as $id => $item) {
            $astro = Astros::find($id);

            // Si ya fue comprado por otro, saltarlo
            if (!$astro || $astro->estado != 0) {
                continue;
            }

            // Crear compra
            $compra = Compras::create([
                'astros_id'   => $astro->id,
                'usuarios_id' => $usuario->id,
            ]);

            // Marcar astro como comprado
            $astro->update(['estado' => 1]);

            // Crear pago
            Pagos::create([
                'compras_id'        => $compra->id,
                'astros_usuarios_id'=> null,
                'tipo'              => 'compra',
                'monto'             => $astro->precio,
                'dias_alquiler'     => null,
            ]);
        }

        // Vaciar carrito
        session()->forget('carrito');

        return redirect()->route('compras')->with('success', '¡Compra realizada con éxito!');
    }
}
