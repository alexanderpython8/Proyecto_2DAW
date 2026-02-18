<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = Usuario::all();
        return view('backend.usuarios.gestion_usuarios', compact('usuarios'));
    }

    public function create() {
        // creamos el usuario María utilizando el modelo
        $usuarios = new Usuario();
        $usuarios->nombre = 'Alejandro Guaman Zuniga';
        $usuarios->email = 'alejandromialola@gmail.com';
        $usuarios->password = Hash::make('123456');
        $usuarios->rol = 1;
        $usuarios->save();

        // redirigimos a la vista de listado de usuarios
        return redirect()->route('backend.usuarios.gestion_usuarios');
    }
}
