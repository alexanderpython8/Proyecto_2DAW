@extends('layouts.insertar')

@section('title', 'Insertar Usuarios')

@section('body')
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_usr') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Usuario</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="rol" class="form-label">Rol:</label>
                            <select name="rol" id="rol" class="form-select">
                                <!-- Muestra las opciones de roles que serán Administrador y Usuario -->
                                <option value="default" selected disabled>Selecciona una opción</option>
                                <option value=1>Administrador</option>
                                <option value=0>Usuario</option>
                            </select>
                        </div>
                        <!-- Confirmo la insercción del usuario -->
                        <button type="submit" class="btn btn-success mt-5">Guardar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
