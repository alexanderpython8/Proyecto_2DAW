<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Astros;
use App\Models\Usuarios;
use App\Models\Compras;
use App\Models\Astros_Usuarios;
use Illuminate\View\View;

class PagosController extends Controller
{
    public function All() : View
    {
        $pagos    = Pagos::orderBy('id', 'asc')->get();
        $astros   = Astros::orderBy('id', 'asc')->get();
        $usuarios = Usuarios::orderBy('id', 'asc')->get();
        $compras  = Compras::orderBy('id', 'asc')->get();
        $alquileres = Astros_Usuarios::orderBy('id', 'asc')->get();

        return view('backend.pago.gestion_pago', compact('pagos', 'astros', 'usuarios', 'compras', 'alquileres'));
    }
}