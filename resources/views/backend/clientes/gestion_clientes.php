<?php
    // session_start();

    // // Verificacion si es Administrador par poder acceder a esta pagina
    // if(!isset($_SESSION["nombre"]) || $_SESSION["rol"] != 1) {
    //     header("location:../panel.php");
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
    // $result = $conn->query("SELECT * FROM clientes ORDER BY id DESC LIMIT $limit OFFSET $offset");
    // $clientes = [];
    // while ($row = $result->fetch_assoc()) {
    //     $clientes[] = $row;
    // }

    // // contar total de clientes
    // $total = $conn->query("SELECT COUNT(*) as total FROM clientes")->fetch_assoc()['total'];
    // $total_paginas = ceil($total / $limit);

    // $nombre = $_SESSION["nombre"]; 
    // $rol = $_SESSION["rol"]; 
    // $img = $_SESSION["img"] ?? '';

    // // Si el usuario no tiene img se pone una por defecto
    // if (empty($img)) {
    //     $img = 'admin.jpg';
    // }

    // // eliminar cliente
    // if (isset($_GET["eliminar"])) {
    //     if ($rol != 1) {
    //         header("location:gestion_clientes.php");
    //         exit;
    //     }

    //     $id_cliente = intval($_GET["eliminar"]);
    //     $conn->query("DELETE FROM clientes WHERE id = $id_cliente");
    //     header("location:gestion_clientes.php");
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo_gestion.css">
    <style>
        body {
            background-image: url("../img/4k-earth-overcast-planet-5go4pukq2go4shxz.jpg");
        }
    </style>
</head>
<body class="bg-light">
    <aside class="bg-primary text-white d-flex flex-column p-3"
            style="width: 260px; min-height: 100vh; position: fixed; left:0; top:0;">

        <div class="text-center mb-4">
            <img src="../img/<?= $img ?>"
                    class="rounded-circle mb-2" width="80" height="80" alt="avatar">

            <h5 class="mb-0"><?= htmlspecialchars($nombre) ?></h5>
            <small class="text-light"><?= htmlspecialchars($rol) == 1 ? "Administrador" : "Usuario" ?></small>

            <!-- Botón para cerrar sesión y volver al index -->
            <div class="mt-2">
                <a href="../logout.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

        <hr>

        <div class="list-group">

            <a href="gestion_clientes.php"
                class="list-group-item list-group-item-action"
                <?= basename($_SERVER['PHP_SELF']) == 'gestion_clientes.php' ? 'active' : '' ?>">
                👥 Clientes
            </a>

            <a href="../planetas/gestion_planetas.php" 
                class="list-group-item list-group-item-action">
                🌍 Planetas
            </a>

            <a href="../pedidos/gestion_pedidos.php" 
                class="list-group-item list-group-item-action">
                🧾 Pedidos
            </a>

            <a href="../sistemas_estelares/gestion_sistemas_estelares.php" 
                class="list-group-item list-group-item-action">
                🔒 Sistemas estelares
            </a>

            <a href="../panel.php" 
                class="list-group-item list-group-item-action">
                💻 Panel de control
            </a>
        </div>

    </aside>

    <div class="container-fluid mt-4" style="padding-left: 300px;">

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
    </div>

    <!-- Confirmación de eliminacion de cliente -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que deseas eliminar este Cliente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pequeño script para el uso de una funcion que elimina de la tabla clientes el dato elegido -->
    <script>
        function eliminarCliente(numcliente) 
        {
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
            document.getElementById('confirmDeleteBtn').onclick = () => 
            {
                window.location.href = 'gestion_clientes.php?eliminar=' + numcliente;
                modal.hide();
            };
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
