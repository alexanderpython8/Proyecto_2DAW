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
    // $result = $conn->query("SELECT * FROM usuarios ORDER BY id DESC LIMIT $limit OFFSET $offset");
    // $usuarios = [];
    // while ($row = $result->fetch_assoc()) {
    //     $usuarios[] = $row;
    // }

    // // contar total de clientes
    // $total = $conn->query("SELECT COUNT(*) as total FROM usuarios")->fetch_assoc()['total'];
    // $total_paginas = ceil($total / $limit);

    // $nombre = $_SESSION["nombre"];
    // $rol = $_SESSION["rol"];
    // $img = $_SESSION["img"] ?? '';

    // // Si el usuario no tiene img se pone una por defecto
    // if (empty($img)) {
    //     $img = 'admin.jpg';
    // }

    // if (isset($_GET["eliminar"])) {
    //     // Verefico
    //     if ($rol != 1) {
    //         header("location:gestion_usuarios.php");
    //         exit;
    //     }

    //     $id_usuario = intval($_GET["eliminar"]); // código en mi bd del usuario a eliminar
    //     $conn->query("DELETE FROM usuarios WHERE id = $id_usuario");
    //     header("location:gestion_usuarios.php");
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo_gestion.css">
    <style>
        body {
            background-image: url("../img/asteroids-of-solar-system-hd-lf9eaj5sxtwrjw7i.jpg");
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

            <a href="../panel.php" 
                class="list-group-item list-group-item-action">
                💻 Panel de control
            </a>

        </div>

    </aside>

    <div class="container-fluid mt-4" style="padding-left: 300px;">

        <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Usuarios</h2>

        <div class="card shadow" style="max-width: 1500px; width: 100%;">
            <div class="card-header bg-primary text-white">📋 Lista de Usuarios</div>
            <div class="card-body">

                <!-- Alertas de error  -->
                <?php
                    if (isset($_GET["sis"])) {
                        if ($_GET["sis"] == 0) {
                            echo '<div class="alert alert-success">✅ Usuario insertado correctamente.</div>';
                        }
                        if ($_GET["sis"] == 1) {
                            echo '<div class="alert alert-warning">⚠️ El email ya existe en la base de datos.</div>';
                        }
                        if ($_GET["sis"] == 2) {
                            echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el usuario.</div>';
                        }
                    }
                ?>

                <div class="row mb-3 me-2 float-end">
                    <a href="ins_usr_mysqli.php" class="btn btn-success">➕ Nuevo Usuario</a>  
                </div>

                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Nombre</th>
                            <th>Create time</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= htmlspecialchars($c['email']) ?></td>
                            <td><?= $c['rol'] == 0 ? 'Usuario' : 'Administrador' ?></td>
                            <td><?= htmlspecialchars($c['nombre']) ?></td>
                            <td><?= htmlspecialchars($c['create_time']) ?></td>
                            <td>
                                <!-- Solo disponble la edicion y eliminacion para administradores -->
                                <?php if ($rol == 1): ?>
                                    <a href="edit_usr_mysqli.php?edit=<?= $c['id'] ?>"
                                    class="btn btn-sm btn-warning">✏️</a>

                                    <button type="button"
                                            class="btn btn-danger"
                                            onclick="eliminarUsuario(<?= $c['id']; ?>)">
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
                <nav aria-label="Paginación">
                  <ul class="pagination justify-content-center mt-3">
                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                      <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="gestion_usuarios.php?page=<?= $i ?>"><?= $i ?></a>
                      </li>
                    <?php endfor; ?>
                  </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Confirmación de eliminacion de usuario -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que deseas eliminar este Usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pequeño script para el uso de una funcion que elimina de la tabla Usuario el dato elegido -->
    <script>
        function eliminarUsuario(numusuario) 
        {
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
            document.getElementById('confirmDeleteBtn').onclick = () => 
            {
                window.location.href = 'gestion_usuarios.php?eliminar=' + numusuario;
                modal.hide();
            };
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>