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
            <?php if ($rol == 1): ?>
                <div class="row mb-3 me-2 float-end">
                    <a href="{{ route('ins_pag') }}" class="btn btn-success">➕ Nuevo Sistema</a>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo Estrella</th>
                        <th>Numero Planetas</th>
                        <th>Distancia</th>
                        <th>Descripcion</th>
                        <?php if ($rol == 1): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sistemas_estelares as $s): ?>
                    <tr>
                        <td><?= $s['id_sistema'] ?></td>
                        <td><?= htmlspecialchars($s['nombre']) ?></td>
                        <td><?= htmlspecialchars($s['tipo_estrella']) ?></td>
                        <td><?= $s['numero_planetas'] ?></td>
                        <td>
                            <?= $s['distancia'] == 0 ? '0' : $s['distancia'] . ' años luz' ?>
                        </td>
                        <td style="width: 35%;"><?= htmlspecialchars($s['descripcion']) ?></td>
                        <td>
                            <!-- Solo disponble la edicion y eliminacion para administradores -->
                            <?php if ($rol == 1): ?>
                                <a href="edit_sis_mysqli.php?edit=<?= $s['id_sistema'] ?>"
                                class="btn btn-sm btn-warning">✏️</a>

                                <button type="button"
                                        class="btn btn-danger"
                                        onclick="eliminarSistema(<?= $s['id_sistema']; ?>)">
                                    🗑️
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Metodo de paginacion de maximo en 10 -->
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Pago?')
