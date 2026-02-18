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

    // // extraigo los pedidos
    // $result = $conn->query("SELECT * FROM pedidos ORDER BY id_pedido DESC LIMIT $limit OFFSET $offset");
    // $pedidos = [];

    // //Los guardo en un array
    // while ($row = $result->fetch_assoc()) 
    // {
    //     $pedidos[] = $row;
    // }

    // // contar total de clientes
    // $total = $conn->query("SELECT COUNT(*) as total FROM pedidos")->fetch_assoc()['total'];
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
    //         header("location:gestion_pedidos.php");
    //         exit;
    //     }

    //     $id_pedido = intval($_GET["eliminar"]); // código en mi bd del pedido a eliminar
        
    //     $sql_pedido_actual = "SELECT id_planeta FROM pedidos WHERE id_pedido = $id_pedido";
    //     $res_pedido_actual = mysqli_query($conn, $sql_pedido_actual);
    //     $pedido_actual = mysqli_fetch_assoc($res_pedido_actual);
    //     $id_planeta = $pedido_actual['id_planeta'];

    //     $conn->query("DELETE FROM pedidos WHERE id_pedido = $id_pedido");

    //     $sql_update = "UPDATE planetas SET vendido='N' WHERE id=$id_planeta";
    //     mysqli_query($conn, $sql_update);
    //     header("location:gestion_pedidos.php");
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo_gestion.css">
    <style>
        body {
            background-image: url("../img/minimalist-space-3840-x-2183-wallpaper-c27lewilmfd7166e.jpg");
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
                <nav aria-label="Paginación">
                  <ul class="pagination justify-content-center mt-3">
                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                      <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="gestion_pedidos.php?page=<?= $i ?>"><?= $i ?></a>
                      </li>
                    <?php endfor; ?>
                  </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Confirmación de eliminacion de pedidos -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que deseas eliminar este Pedido?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pequeño script para el uso de una funcion que elimina de la tabla pedidos el dato elegido -->
    <script>
        function eliminarPedido(numPedido) {
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();

            document.getElementById('confirmDeleteBtn').onclick = () => {
                // Redirige a la misma página con el ID del pedido para eliminarlo en PHP
                window.location.href = 'gestion_pedidos.php?eliminar=' + numPedido;
                modal.hide();
            };
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>