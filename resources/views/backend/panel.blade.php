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
    <link rel="stylesheet" href="{{ asset('css/estilo_panel.css') }}">
    <title>Panel de Control</title>
</head>
<body>
    <header class="top-header">
        <div class="user-info">
            <img src="{{ asset('img/Comprar.jpg') }}" alt="avatar" class="avatar">
            
            <div class="user-text">
                <h5>Usuario</h5>
                <small>Administrador</small>
            </div>
        </div>
    </header>

    <main>
        <div class="dashboard">
            <h1>Panel de Control</h1>

            <div class="cards">
                <div class="card cli">
                    <a href="{{ route('gestion_ast') }}">
                        <div class="icon">👨‍💼</div>
                        <h2>Astros</h2>
                    </a>
                </div>

                <div class="card pla">
                    <a href="{{ route('gestion_com') }}">
                        <div class="icon">🌍</div>
                        <h2>Comprar</h2>
                    </a>
                </div>

                <div class="card sis">
                    <a href="{{ route('gestion_alq') }}">
                        <div class="icon">🌠</div>
                        <h2>Alquiler</h2>
                    </a>
                </div>

                <div class="card ped">
                    <a href="{{ route('gestion_pag') }}">
                        <div class="icon">📡</div>
                        <h2>Pago</h2>
                    </a>
                </div>
                <div class="card usr">
                    <a href="{{ route('gestion_usr') }}">
                        <div class="icon">🔒</div>
                        <h2>Usuarios</h2>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>