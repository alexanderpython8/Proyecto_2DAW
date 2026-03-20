<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AstrosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AstrosUsuariosController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\ComprasController;
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
    $astros = \App\Models\Astros::all();
    return view('frontend.comprar.compras', compact('astros'));
})->name('compras');

Route::get('/inicio_sesion', [AuthController::class, 'showLogin'])->name('login');
Route::post('/inicio_sesion', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'admin'])->group(function () {
    /*
    Todos lo enlaces del Backend
    */

    // Enlace del panel #########################################################################################

    Route::get('/panel', fn() => view('backend.panel'))->name('panel_control');

    // Backed enlaces Usuarios #########################################################################################

    Route::get('/gestion_usuario', function () {
        return view('backend.usuarios.gestion_usuarios');
    })->name('gestion_usr');

    Route::get('/ins_usuario', function () {
        return view('backend.usuarios.ins_usr_mysqli');
    })->name('ins_usr');

    Route::get('/gestion_usuario', [UsuariosController::class, 'All'])->name('gestion_usr');
    Route::get('/ins_usuario', [UsuariosController::class, 'crear'])->name('ins_usr');
    Route::post('/usuarios/save', [UsuariosController::class, 'save'])->name('save_usr');
    Route::get('/edit_usuario/{usuarios}', [UsuariosController::class, 'editar'])->name('edit_usr');
    Route::put('/usuarios/update/{usuarios}', [UsuariosController::class, 'update'])->name('update_usr');
    Route::delete('/usuarios/delete/{usuarios}', [UsuariosController::class, 'delete'])->name('drop_usr');

    // Backed enlaces Alquiler #########################################################################################

    Route::get('/gestion_alquiler', function () {
        return view('backend.alquiler.gestion_alquiler');
    })->name('gestion_alq');

    Route::get('/ins_alquiler', function () {
        return view('backend.alquiler.ins_alq_mysqli');
    })->name('ins_alq');

    Route::get('/gestion_alquiler', [AstrosUsuariosController::class, 'All'])->name('gestion_alq');
    Route::get('/ins_alquiler', [AstrosUsuariosController::class, 'crear'])->name('ins_alq');
    Route::post('/alquiler/save', [AstrosUsuariosController::class, 'save'])->name('save_alq');
    Route::get('/edit_alquiler/{astros_usuarios}', [AstrosUsuariosController::class, 'editar'])->name('edit_alq');
    Route::put('/alquileres/update/{astros_usuarios}', [AstrosUsuariosController::class, 'update'])->name('update_alq');
    Route::delete('/alquileres/delete/{astros_usuarios}', [AstrosUsuariosController::class, 'delete'])->name('drop_alq');

    // Backed enlaces Astros #########################################################################################

    Route::get('/gestion_astro', [AstrosController::class, 'All'])->name('gestion_ast');
    Route::get('/ins_astro', [AstrosController::class, 'crear'])->name('ins_ast');
    Route::post('/astro/save', [AstrosController::class, 'save'])->name('save_ast');
    Route::get('/edit_astro/{astros}', [AstrosController::class, 'editar'])->name('edit_ast');
    Route::put('/astros/update/{astros}', [AstrosController::class, 'update'])->name('update_ast');
    Route::delete('/astros/delete/{astros}', [AstrosController::class, 'delete'])->name('drop_ast');

    // Backed enlaces Compra #########################################################################################

    Route::get('/gestion_compra', function () {
        return view('backend.compra.gestion_compra');
    })->name('gestion_com');

    Route::get('/ins_compra', function () {
        return view('backend.compra.ins_com_mysqli');
    })->name('ins_com');

    Route::get('/gestion_compra', [ComprasController::class, 'All'])->name('gestion_com');
    Route::get('/ins_compra', [ComprasController::class, 'crear'])->name('ins_com');
    Route::post('/compra/save', [ComprasController::class, 'save'])->name('save_com');
    Route::get('/edit_compra/{compras}', [ComprasController::class, 'editar'])->name('edit_com');
    Route::put('/compra/update/{compras}', [ComprasController::class, 'update'])->name('update_com');
    Route::delete('/compra/delete/{compras}', [ComprasController::class, 'delete'])->name('drop_com');

    // Backed enlaces Pago #########################################################################################

    Route::get('/gestion_pago', function () {
        return view('backend.pago.gestion_pago');
    })->name('gestion_pag');

    Route::get('/gestion_pago', [PagosController::class, 'All'])->name('gestion_pag');
    Route::get('/ins_pago', [ComprasController::class, 'crear'])->name('ins_pag');
    Route::post('/pago/save', [ComprasController::class, 'save'])->name('save_pag');
    Route::get('/edit_cpago/{pagos}', [ComprasController::class, 'editar'])->name('edit_pag');
    Route::put('/pago/update/{pagos}', [ComprasController::class, 'update'])->name('update_pag');
    Route::delete('/pago/delete/{pagos}', [ComprasController::class, 'delete'])->name('drop_pag');
});


