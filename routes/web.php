<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/probar-db', function () {
    try {
        $tablas = DB::select('SHOW TABLES');
        return response()->json($tablas);
    } catch (\Exception $e) {
        return "Error de conexión: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});
