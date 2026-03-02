@extends('layouts.gestionar')

@section('title', 'Gestion Compras')
@section('fondo')
    <style>
        body {
            background-image: url("../img/minimalist-space-3840-x-2183-wallpaper-c27lewilmfd7166e.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Pedidos</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Pedidos</div>
        <div class="card-body">

            <!-- Alertas de error  -->
            <?php
                if (isset($_GET["ped"])) {
                    if ($_GET["ped"] == 0) {
                        echo '<div class="alert alert-success">✅ Pedido insertado correctamente.</div>';
                    }
                    if ($_GET["ped"] == 1) {
                        echo '<div class="alert alert-warning">⚠️ El planeta ya esta vendido.</div>';
                    }
                    if ($_GET["ped"] == 2) {
                        echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el pedido.</div>';
                    }
                    if ($_GET["ped"] == 3) {
                        echo '<div class="alert alert-warning">⚠️ El id del cliente no existe.</div>';
                    }
                    if ($_GET["ped"] == 4) {
                        echo '<div class="alert alert-danger">⚠️ El id de planeta no existe.</div>';
                    }
                }
            ?>

            <!-- Iserción de nuevos valores solo par administradores -->
            <?php if ($rol == 1): ?>
                <div class="row mb-3 me-2 float-end">
                    <a href="ins_ped_mysqli.php" class="btn btn-success">➕ Nuevo Pedido</a>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID planeta</th>
                        <th>ID cliente</th>
                        <th>Total</th>
                        <th>Descuento</th>
                        <th>Fecha_pedido</th>
                        <?php if ($rol == 1): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $p): ?>
                    <tr>
                        <td><?= $p['id_pedido'] ?></td>
                        <td><?= htmlspecialchars($p['id_planeta']) ?></td>
                        <td><?= htmlspecialchars($p['id_cliente']) ?></td>
                        <td><?= $p['total'] ?></td>
                        <td><?= $p['descuento'] ?>%</td>
                        <td><?= htmlspecialchars($p['fecha_pedido']) ?></td>
                        <td>
                            <!-- Solo disponble la edicion y eliminacion para administradores -->
                            <?php if ($rol == 1): ?>
                                <a href="edit_ped_mysqli.php?edit=<?= $p['id_pedido'] ?>"
                                class="btn btn-sm btn-warning">✏️</a>

                                <button type="button"
                                        class="btn btn-danger"
                                        onclick="eliminarPedido(<?= $p['id_pedido']; ?>)">
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

@section('MEliminacion', '¿Seguro que deseas eliminar esta Compra?')
