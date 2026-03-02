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
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Clientes</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Clientes</div>
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

            <div class="row mb-3 me-2 float-end">
                <a href="ins_cli_mysqli.php" class="btn btn-success">➕ Nuevo Cliente</a>
            </div>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Género</th>
                        <th>Dirección</th>
                        <th>Código Postal</th>
                        <th>Población</th>
                        <th>Provincia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $c): ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= htmlspecialchars($c['nombre']) ?></td>
                        <td><?= htmlspecialchars($c['apellidos']) ?></td>
                        <td><?= htmlspecialchars($c['email']) ?></td>
                        <td><?= $c['genero'] ?></td>
                        <td><?= htmlspecialchars($c['direccion']) ?></td>
                        <td><?= $c['codpostal'] ?></td>
                        <td><?= htmlspecialchars($c['poblacion']) ?></td>
                        <td><?= htmlspecialchars($c['provincia']) ?></td>
                        <td>
                            <?php if ($rol == 1): ?>
                                <a href="edit_cli_mysqli.php?edit=<?= $c['id'] ?>"
                                class="btn btn-sm btn-warning">✏️</a>

                                <button type="button"
                                        class="btn btn-danger"
                                        onclick="eliminarCliente(<?= $c['id']; ?>)">
                                    🗑️
                                </button>
                            <?php else: ?>
                                <span class="text-muted">—</span>
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
                            <a class="page-link" href="gestion_clientes.php?page=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Alquiler?')
