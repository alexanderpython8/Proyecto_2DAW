<?php
    // session_start();
    // if(!isset($_SESSION["nombre"])) {
    //     header("location:../index.php");
    //     die();
    // }

    // include("db/db_pdo.inc"); 

    // $nombre = $_SESSION["nombre"];
    // $rol = $_SESSION["rol"];
    // $img = $_SESSION["img"] ?? '';

    // // Si el usuario no tiene img se pone una por defecto
    // if (empty($img)) {
    //     $img = 'admin.jpg';
    // }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo_panel.css">
    <title>Panel de Control</title>
</head>
<body>
    <header class="top-header">
        <div class="user-info">
            <img src="./img/<?= $img ?>" alt="avatar" class="avatar">
            
            <div class="user-text">
                <h5><?= htmlspecialchars($nombre) ?></h5>
                <small><?= htmlspecialchars($rol) == 1 ? "Administrador" : "Usuario" ?></small>
            </div>
        </div>
    </header>

    <main>
        <div class="dashboard">
            <h1>Panel de Control</h1>

            <div class="cards">

                <!-- Solo puede acceder los administradores -->
                <?php if ($rol == 1): ?>
                <div class="card cli">
                    <a href="clientes/gestion_clientes.php">
                        <div class="icon">👨‍💼</div>
                        <h2>Clientes</h2>
                    </a>
                </div>
                <?php endif; ?>

                <div class="card pla">
                    <a href="planetas/gestion_planetas.php">
                        <div class="icon">🌍</div>
                        <h2>Planetas</h2>
                    </a>
                </div>

                <div class="card sis">
                    <a href="sistemas_estelares/gestion_sistemas_estelares.php">
                        <div class="icon">🌠</div>
                        <h2>Sistemas Estelares</h2>
                    </a>
                </div>

                <div class="card ped">
                    <a href="pedidos/gestion_pedidos.php">
                        <div class="icon">📡</div>
                        <h2>Pedidos</h2>
                    </a>
                </div>

                <!-- Solo puede acceder los administradores -->
                <?php if ($rol == 1): ?>
                <div class="card usr">
                    <a href="usuarios/gestion_usuarios.php">
                        <div class="icon">🔒</div>
                        <h2>Usuarios</h2>
                    </a>
                </div>
                <?php endif; ?>

                <div class="card exit">
                    <a href="./logout.php">
                        <div class="icon">🕳️</div>
                        <h2>Cerrar sesión</h2>
                    </a>
                </div>

            </div>
        </div>
    </main>
</body>
</html>
