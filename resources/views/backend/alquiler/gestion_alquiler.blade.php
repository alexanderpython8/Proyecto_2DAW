@extends('layouts.gestionar')

@section('title', 'Gestion Alquiler')
@section('fondo')
    <style>
        body {
            background-image: url("../img/4k-earth-overcast-planet-5go4pukq2go4shxz.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Alquiler</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Alquileres</div>
        <div class="card-body">

            <!-- Alertas de error  -->
            <?php
                // if (isset($_GET["cli"])) {
                //     if ($_GET["cli"] == 0) {
                //         echo '<div class="alert alert-success">✅ Cliente insertado correctamente.</div>';
                //     }
                //     if ($_GET["cli"] == 1) {
                //         echo '<div class="alert alert-warning">⚠️ El email ya existe en la base de datos.</div>';
                //     }
                //     if ($_GET["cli"] == 2) {
                //         echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el usuario.</div>';
                //     }
                // }
            ?>

            @if ($rol == 1)
                <div class="row mb-3 me-2 float-end">
                    <a href="{{ route('ins_alq') }}" class="btn btn-success">➕ Nuevo Alquiler</a>
                </div>
            @endif

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Astro</th>
                        <th>Usuario</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        @if ($rol == 1)
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alquiler as $alq)
                        <tr>
                            <td>{{ $alq->id }}</td>
                            <td>{{ $alq->id_astro }}</td>
                            <td>{{ $alq->id_usuario }}</td>
                            <td>{{ $alq->fechaInicio }}</td>
                            <td>{{ $alq->fechaFin }}</td>
                            <td>
                                @if ($rol == 1)
                                    <a href="edit_usr_mysqli.php?edit={{ $alq->id }}"
                                    class="btn btn-sm btn-warning">✏️</a>

                                    <button type="button"
                                            class="btn btn-danger"
                                            onclick="eliminarAlquiler('{{ $alq->id }}')">
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
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Alquiler?')
