<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use Illuminate\Http\View;

class PagosController extends Controller
{
    public function All() : View
    {
        $pagos = Pagos::orderBy('id', 'asc')->get();
        return view('backend.pago.gestion_pago', compact('pagos'));
    }
}
