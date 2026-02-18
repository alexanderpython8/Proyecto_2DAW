<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\DB;
use App\Models\Note;

// Route::get('/probar-db', function () {
//     try {
//         $tablas = DB::select('SHOW TABLES');
//         return response()->json($tablas);
//     } catch (\Exception $e) {
//         return "Error de conexión: " . $e->getMessage();
//     }
// });

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/compras', function () {
    return view('frontend.comprar.compras');
})->name('compras');

Route::get('/inicio_sesion', function () {
    return view('inicio_sesion');
})->name('login');

/*
Todos lo enlaces del Backend
*/

// Enlace del panel
Route::get('/panel', function () {
    return view('backend.panel');
})->name('panel_control');

// Backed enlaces Usuarios
Route::get('/edit_usr_mysqli', function () {
    return view('backend.usuarios.edit_usr_mysqli');
})->name('edit_usr');

Route::get('/gestion_usuarios', [UsuarioController::class, 'index'])->name('gestion_usr');
Route::get('/create', [UsuarioController::class, 'create'])->name('inserccion_usr');


Route::get('/ins_usr_mysqli', function () {
    return view('backend.usuarios.ins_usr_mysqli');
})->name('ins_usr');

// Backed enlaces Alquiler
Route::get('/edit_alq_mysqli', function () {
    return view('backend.alquiler.edit_alq_mysqli');
})->name('edit_alq');

Route::get('/gestion_alquiler', function () {
    return view('backend.alquiler.gestion_alquiler');
})->name('gestion_alq');

Route::get('/ins_alq_mysqli', function () {
    return view('backend.alquiler.ins_alq_mysqli');
})->name('ins_alq');

// Backed enlaces Astros
Route::get('/edit_ast_mysqli', function () {
    return view('backend.astros.edit_ast_mysqli');
})->name('edit_ast');

Route::get('/gestion_astros', function () {
    return view('backend.astros.gestion_astros');
})->name('gestion_ast');

Route::get('/ins_ast_mysqli', function () {
    return view('backend.astros.ins_ast_mysqli');
})->name('ins_ast');

// Backed enlaces Compra
Route::get('/edit_com_mysqli', function () {
    return view('backend.compra.edit_com_mysqli');
})->name('edit_com');

Route::get('/gestion_compra', function () {
    return view('backend.compra.gestion_compra');
})->name('gestion_com');

Route::get('/ins_com_mysqli', function () {
    return view('backend.compra.ins_com_mysqli');
})->name('ins_com');

// Backed enlaces Pago
Route::get('/edit_pag_mysqli', function () {
    return view('backend.pago.edit_alq_mysqli');
})->name('edit_pag');

Route::get('/gestion_pago', function () {
    return view('backend.pago.gestion_pago');
})->name('gestion_pag');

Route::get('/ins_pag_mysqli', function () {
    return view('backend.pago.ins_pag_mysqli');
})->name('ins_pag');







