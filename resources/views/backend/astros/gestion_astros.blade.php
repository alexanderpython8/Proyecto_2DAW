<?php
    // session_start();
    // if(!isset($_SESSION["nombre"])) {
    //     header("location:../index.php");
    //     die();
    // }

    // // Incluimos la conexión a la BD
    // include("../db/db.inc"); 

    // //Extraigo la cantidad de paginas 
    // $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // //Limites posibles de valores sera de 10, como lo pidio el profe
    // $limit = 10;
    // $offset = ($page - 1) * $limit;

    // // traer los clientes
    // $result = $conn->query("SELECT * FROM planetas ORDER BY id DESC LIMIT $limit OFFSET $offset");
    // $planetas = [];
    // while ($row = $result->fetch_assoc()) {
    //     $planetas[] = $row;
    // }

    // // contar total de clientes
    // $total = $conn->query("SELECT COUNT(*) as total FROM planetas")->fetch_assoc()['total'];
    // $total_paginas = ceil($total / $limit);
    
    // $nombre = $_SESSION["nombre"];
    // $rol = $_SESSION["rol"];
    // $img = $_SESSION["img"] ?? '';

    // // Si el usuario no tiene img se pone una por defecto
    // if (empty($img)) {
    //     $img = 'admin.jpg';
    // }

    // if (isset($_GET["eliminar"])) {

    //     if ($rol != 1) {
    //         header("location:gestion_planetas.php");
    //         exit;
    //     }

    //     $id_planeta = intval($_GET["eliminar"]); // código en mi bd del cliente a eliminar
    //     $conn->query("UPDATE planetas SET estado = 0 WHERE id = $id_planeta");
    //     header("location:gestion_planetas.php");
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Planetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo_gestion.css">
    <style>
        body {
            background-image: url("../img/4k-earth-surreal-look-v85atk12miu0j8u8.jpg");
        }
    </style>
</head>
<body class="bg-light">
    <aside class="bg-primary text-white d-flex flex-column p-3"
            style="width: 260px; min-height: 100vh; position: fixed; left:0; top:0;">

        <div class="text-center mb-4">
            <img src="../img/Comprar.jpg"
                    class="rounded-circle mb-2" width="80" height="80" alt="avatar">

            <h5>Usuario</h5>
            <small>Administrador</small>

            <!-- Botón para cerrar sesión y volver al index -->
            <div class="mt-2">
                <a href="{{ route('welcome') }}" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

        <hr>

        <div class="list-group">

            <a href="{{ route('gestion_ast') }}"
                class="list-group-item list-group-item-action">
                👥 Astros
            </a>

            <a href="{{ route('gestion_com') }}" 
                class="list-group-item list-group-item-action">
                🌍 Comprar
            </a>

            <a href="{{ route('gestion_alq') }}" 
                class="list-group-item list-group-item-action">
                🧾 Alquiler
            </a>

            <a href="{{ route('gestion_pag') }}" 
                class="list-group-item list-group-item-action">
                🔒 Pagos
            </a>

            <a href="{{ route('gestion_usr') }}" 
                class="list-group-item list-group-item-action">
                💻 Usuario
            </a>

            <a href="{{ route('panel_control') }}" 
                class="list-group-item list-group-item-action">
                💻 Panel de control
            </a>
        </div>

    </aside>

    <div class="container-fluid mt-4" style="padding-left: 300px;">

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
    </div>
    <!-- Modal de confirmación (añádelo al final del body) -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar Descontinuacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que deseas descontinuacion este Planeta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Descontinuar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmación de eliminacion de planetas -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar Descontinuar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que deseas descontinuar este Planeta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Descontinuar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pequeño script para el uso de una funcion que elimina de la tabla planeta el dato elegido -->
    <script>
        function eliminarPlaneta(numPlaneta) 
        {
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
            document.getElementById('confirmDeleteBtn').onclick = () => 
            {
                window.location.href = 'gestion_planetas.php?eliminar=' + numPlaneta;
                modal.hide();
            };
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>