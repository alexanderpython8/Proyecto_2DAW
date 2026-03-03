@extends('layouts.gestionar')

@section('title', 'Gestion Usuarios')
@section('fondo')
    <style>
        body {
            background-image: url("..assets/img/asteroids-of-solar-system-hd-lf9eaj5sxtwrjw7i.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Usuarios</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Usuarios</div>
        <div class="card-body">

            <!-- Alertas de error  -->
            <?php
                // if (isset($_GET["sis"])) {
                //     if ($_GET["sis"] == 0) {
                //         echo '<div class="alert alert-success">✅ Usuario insertado correctamente.</div>';
                //     }
                //     if ($_GET["sis"] == 1) {
                //         echo '<div class="alert alert-warning">⚠️ El email ya existe en la base de datos.</div>';
                //     }
                //     if ($_GET["sis"] == 2) {
                //         echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el usuario.</div>';
                //     }
                // }
            ?>

            <div class="row mb-3 me-2 float-end">
                <a href="{{ route('ins_usr') }}" class="btn btn-success">➕ Nuevo Usuario</a>
            </div>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usr)
                    <tr>
                        <td>{{ $usr->id }}</td>
                        <td>{{ $usr->nombre }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->rol }}</td>
                        <td>
                            <!-- Solo disponble la edicion y eliminacion para administradores -->

                            @if ($rol == 1)
                                <a href="edit_usr_mysqli.php?edit={{ $usr->id }}"
                                class="btn btn-sm btn-warning">✏️</a>

                                <button type="button"
                                        class="btn btn-danger"
                                        onclick="eliminarUsuario('{{ $usr->id }}')">
                                    🗑️
                                </button>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Metodo de paginacion de maximo en 10 -->
            <nav aria-label="Paginación">
                <ul class="pagination justify-content-center mt-3">

                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Usuario?')
