@extends('layouts.insertar')

@section('title', 'Insertar Alquiler')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="./gestion_clientes.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Cliente con MySQL</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="codpostal" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="codpostal" name="codpostal" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="poblacion" class="form-label">Población</label>
                            <input type="text" class="form-control" id="poblacion" name="poblacion" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="genero" class="form-label">Género</label>
                            <select name="genero" id="genero" class="form-select">
                                <!-- Muestro las opciones de genero -->
                                <option value="default" selected disabled>Selecciona una opción</option>
                                <option value="M">Hombre</option>
                                <option value="F">Mujer</option>
                                <option value="O">Otro</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-5">Guardar cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
