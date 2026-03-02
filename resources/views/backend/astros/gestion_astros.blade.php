@extends('layouts.gestionar')

@section('title', 'Gestion Astros')
@section('fondo')
    <style>
        body {
            background-image: url("../img/4k-earth-surreal-look-v85atk12miu0j8u8.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Planetas</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Planetas</div>
        <div class="card-body">

            <!-- Alertas de error  -->
            <?php
                if (isset($_GET["pla"])) {
                    if ($_GET["pla"] == 0) {
                        echo '<div class="alert alert-success">✅ Planeta insertado correctamente.</div>';
                    }
                    if ($_GET["pla"] == 1) {
                        echo '<div class="alert alert-warning">⚠️ El nombre ya existe en la base de datos.</div>';
                    }
                    if ($_GET["pla"] == 2) {
                        echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el planeta.</div>';
                    }
                }
            ?>

            <!-- Iserción de nuevos valores solo par administradores -->
            <?php if ($rol == 1): ?>
                <div class="row mb-3 me-2 float-end">
                    <a href="ins_pla_mysqli.php" class="btn btn-success">➕ Nuevo Planeta</a>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Masa</th>
                        <th>Distancia</th>
                        <th>Precio</th>
                        <th>Vendido</th>
                        <th>Estado</th>
                        <th>ID Sistema</th>
                        <?php if ($rol == 1): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($planetas as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['nombre']) ?></td>
                        <td style="width: 25%;"><?= htmlspecialchars($p['descripcion']) ?></td>
                        <td><?= htmlspecialchars($p['masa']) ?></td>
                        <td>
                            <?= $p['distancia'] == 0 ? '0' : $p['distancia'] . ' millones de kilometros' ?>
                        </td>
                        <td><?= $p['precio'] ?></td>
                        <td><?= $p['vendido'] == 'N' ? 'Libre' : 'Vendido'?></td>
                        <td><?= $p['estado'] == 0 ? 'Descontinuado' : 'Activo'?></td>
                        <td><?= $p['id_sistema'] ?></td>
                        <td>
                            <!-- Solo disponble la edicion y eliminacion para administradores -->
                            <?php if ($rol == 1): ?>
                                <a href="edit_pla_mysqli.php?edit=<?= $p['id'] ?>"
                                class="btn btn-sm btn-warning">✏️</a>

                                <button type="button"
                                        class="btn btn-danger"
                                        onclick="eliminarPlaneta(<?= $p['id']; ?>)">
                                    🗑️
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Metodo de paginacion de maximo en 10 -->
            <nav aria-label="Paginacion">
                <ul class="pagination justify-content-center mt-3">
                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <li class="page-item<?php if ($i == $page) echo ' active'; ?>">
                        <a class="page-link" href="gestion_planetas.php?page=<?= $i ?>">
                        <?= $i ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Astro?')
