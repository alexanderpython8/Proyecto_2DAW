<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Astros_Usuarios;
use Illuminate\Http\View;

class AstrosUsuariosController extends Controller
{
    public function All() : View
    {
        $alquiler = Astros_Usuarios::orderBy('id', 'asc')->get();
        return view('backend.alquiler.gestion_alquiler', compact('alquiler'));
    }
}
