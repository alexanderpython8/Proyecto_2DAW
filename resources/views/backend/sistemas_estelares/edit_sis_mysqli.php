<?php
    // session_start();

    // // Verificacion si es Administrador par poder acceder a esta pagina
    // if(!isset($_SESSION["nombre"]) || $_SESSION["rol"] != 1) {
    //     header("location:../panel.php");
    //     die();
    // }
    
    // include("../db/db.inc");//mysqli

    // if (isset($_POST["accion"]) && $_POST["accion"] == "editar") 
    // {// cuando pulse actualizar
        
    //     if(isset($_POST["nombre"]) && !empty($_POST["nombre"])) 
    //     {
    //         // Extraigo los datos necesarios para la edición de los datos de la tabla
    //         $nombre = htmlspecialchars(($_POST["nombre"]));
    //         $tipo_estrella = htmlspecialchars(($_POST["tipo_estrella"]));
    //         $numero_planetas = intval(($_POST["numero_planetas"]));
    //         $distancia = intval(($_POST["distancia"]));
    //         $descripcion = htmlspecialchars(($_POST["descripcion"]));
    //         $id_sistema = intval($_POST["id_sistema"]);
            
    //         //Confirmo si existe otro nombre igual
    //         $sql_nombre = "SELECT id_sistema FROM sistemas_estelares WHERE nombre='$nombre' AND id_sistema != $id_sistema";
    //         $res = mysqli_query($conn, $sql_nombre);
            
    //         if (mysqli_num_rows($res) > 0)
    //         {
    //             header("location:gestion_sistemas_estelares.php?sis=1");
    //             die();
    //         }

    //         //Actualizo los datos con los valores insertados
    //         $sql = "UPDATE sistemas_estelares SET nombre = '$nombre', tipo_estrella = '$tipo_estrella', numero_planetas = '$numero_planetas', distancia = '$distancia', 
    //                 descripcion = '$descripcion' WHERE id_sistema = $id_sistema";
            
    //         if (mysqli_query($conn, $sql)) 
    //         {
    //             header("location:gestion_sistemas_estelares.php?sis=0"); //Si todo ok
    //         }
    //         else 
    //         {
    //             header("location:gestion_sistemas_estelares.php?sis=2"); //Si no actualizo
    //         }
    //         die();
    //     }
    // }
    // if(!isset($_GET["edit"])) {
    //     header("location:gestion_sistemas_estelares.php");
    //     die();
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo_ins.css">
    <title>Document</title>
</head>
<body>
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="./gestion_sistemas_estelares.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Sistemas Estelares con MySQL</h2>
            </div>
            <div class="card-body">

            <?php
                $id_sistema = intval($_GET["edit"]);
                $sql = "SELECT * FROM sistemas_estelares WHERE id_sistema = $id_sistema"; // consulta para obtener los datos del sistemas_estelares
                $res = mysqli_query($conn, $sql); // ejecutar consulta
                if (mysqli_num_rows($res) > 0) { // comprobar si hay resultado
                    $sis = mysqli_fetch_assoc($res); // crear un array asociativo con los datos del sistemas_estelares
                }
                else {
                    header("location:gestion_sistemas_estelares.php");
                    die();
                }
            ?>

                <form method="POST">
                    <input type="hidden" name="id_sistema" value="<?=$id_sistema;?>">
                    <input type="hidden" name="accion" value="editar">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $sis["nombre"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="tipo_estrella" class="form-label">Tipo estrella:</label>
                            <input type="text" class="form-control" id="tipo_estrella" name="tipo_estrella" value="<?= $sis["tipo_estrella"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="numero_planetas" class="form-label">Numero planetas:</label>
                            <input type="number" class="form-control" id="numero_planetas" name="numero_planetas" step="1" value="<?= $sis["numero_planetas"] ?>" required>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="distancia" class="form-label">Distancia:</label>
                            <input type="number" class="form-control" id="distancia" name="distancia" step="1" value="<?= $sis["distancia"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="descripcion" class="form-label">Descripcion:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $sis["descripcion"] ?>" required>
                        </div>
                        <!-- Confirmo la actualización del sistema -->
                        <button type="submit" class="btn btn-success mt-5">Actualizar Sistema</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>