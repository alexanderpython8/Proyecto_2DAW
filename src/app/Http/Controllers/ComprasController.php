<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use Illuminate\Http\View;

class ComprasController extends Controller
{
    public function All() : View
    {
        $compras = Compras::orderBy('id', 'asc')->get();
        return view('backend.compra.gestion_compra', compact('compras'));
    }
}
