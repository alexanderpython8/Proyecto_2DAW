@extends('layouts.gestionar')

@section('title', 'Gestion de pagos')

@section('fondo')
    <style>
        body {
            background-image: url("../img/solar-system-minimalism-q1.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Sistemas</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Sistemas</div>
        <div class="card-body">

            <!-- Alertas de error  -->
            <?php
                if (isset($_GET["sis"])) {
                    if ($_GET["sis"] == 0) {
                        echo '<div class="alert alert-success">✅ Sistema estelar insertado correctamente.</div>';
                    }
                    if ($_GET["sis"] == 1) {
                        echo '<div class="alert alert-warning">⚠️ El nombre ya existe en la base de datos.</div>';
                    }
                    if ($_GET["sis"] == 2) {
                        echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el Sistema estelar.</div>';
                    }
                }
            ?>

            <!-- Iserción de nuevos valores solo par administradores -->
            @if ($rol == 1)
                <div class="row mb-3 me-2 float-end">
                    <a href="{{ route('ins_pag') }}" class="btn btn-success">➕ Nuevo Pago</a>
                </div>
            @endif

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Alquiler</th>
                        <th>Compra</th>
                        <th>Monto</th>
                        <th>Fecha Pago</th>
                        @if ($rol == 1)
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pago as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->id_alquiler }}</td>
                            <td>{{ $p->id_compra }}</td>
                            <td>{{ $p->monto }}€</td>
                            <td>{{ $p->fechaPago }}</td>
                            <td>
                                <!-- Solo disponble la edicion y eliminacion para administradores -->
                                @if ($rol == 1)
                                    <a href="edit_usr_mysqli.php?edit={{ $p->id }}"
                                    class="btn btn-sm btn-warning">✏️</a>

                                    <button type="button"
                                            class="btn btn-danger"
                                            onclick="eliminarPago('{{ $p->id }}')">
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
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Pago?')
