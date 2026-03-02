@extends('layouts.insertar')

@section('title', 'Insertar Pago')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_pag') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Pago</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="tipo_estrella" class="form-label">Tipo estrella</label>
                            <input type="text" class="form-control" id="tipo_estrella" name="tipo_estrella" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="numero_planetas" class="form-label">Numero planetas</label>
                            <input type="number" class="form-control" id="numero_planetas" name="numero_planetas" step="1" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="distancia" class="form-label">Distancia</label>
                            <input type="number" class="form-control" id="distancia" name="distancia" step="1" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <!-- Confirmo la inserccion de la tabla -->
                        <button type="submit" class="btn btn-success mt-5">Guardar Pago</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
