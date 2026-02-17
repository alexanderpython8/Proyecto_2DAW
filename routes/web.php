<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/crear-astro', function ($nombre, $tipo, $estado, $historia, $caracteristicas, $explotacion, $precio, $img) {
    $astro = new Astros();
    $astro->nombre = $nombre;
    $astro->tipo = $tipo;
    $astro->estado = 1;
    $astro->historia = $historia;
    $astro->caracteristicas = $caracteristicas;
    $astro->explotacion = 100;
    $astro->precio = $precio;
    $astro->img = $img;
    $astro->save();
    return 'Astro creado';
});
Route::get('/eliminar-astro', function ($id) {
    $astro = Astros::find($id);
    if ($astro) 
    {
        $astro->delete();
        return 'Astro eliminada';
    }
    return 'Astro no encontrado';
});

Route::get('/inicio_sesion', [AuthController::class, 'showLogin'])->name('login');
Route::post('/inicio_sesion', [AuthController::class, 'login'])->name('login.post');