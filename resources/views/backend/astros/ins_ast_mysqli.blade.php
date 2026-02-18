<?php
    // session_start();

    // // Verificacion si es Administrador par poder acceder a esta pagina
    // if(!isset($_SESSION["nombre"]) || $_SESSION["rol"] != 1) {
    //     header("location:../panel.php");
    //     die();
    // }
    
    // include("../db/db.inc");//mysqli

    // $sql_sistemas = "SELECT id_sistema, nombre FROM sistemas_estelares ORDER BY nombre";
    // $res_sistemas = mysqli_query($conn, $sql_sistemas);
    // $sistemas = [];
    // if ($res_sistemas) {
    //     while ($row = mysqli_fetch_assoc($res_sistemas)) {
    //         $sistemas[] = $row;
    //     }
    //     mysqli_free_result($res_sistemas);
    // }

    // if(isset($_POST["nombre"]) && !empty($_POST["nombre"])) 
    // {
    //     //Extraigo todos los valores necesarios para la insercion de la tabla
    //     $nombre = htmlspecialchars(($_POST["nombre"]));
    //     $descripcion = htmlspecialchars(($_POST["descripcion"]));
    //     $masa = htmlspecialchars(($_POST["masa"]));
    //     $distancia = intval((($_POST["distancia"])));
    //     $precio = intval(($_POST["precio"]));
    //     $id_sistema = htmlspecialchars(($_POST["id_sistema"]));

    //     $sql_nombre = "SELECT * FROM planetas WHERE nombre='$nombre'";
    //     $res = mysqli_query($conn, $sql_nombre);
        
    //     if (mysqli_num_rows($res) > 0)
    //     {
    //         header("location:gestion_planetas.php?pla=1");
    //         die();
    //     }
    //     $sql = "INSERT INTO planetas(nombre, descripcion, masa, distancia, precio, id_sistema)
    //     VALUES ('$nombre', '$descripcion', '$masa', '$distancia', '$precio', '$id_sistema');";
        
    //     if (mysqli_query($conn, $sql)) 
    //     {
    //         header("location:gestion_planetas.php?pla=0");
    //     }
    //     else 
    //     {
    //         header("location:gestion_planetas.php?pla=2");
    //     }
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
        <a href="./gestion_planetas.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Planetas con MySQL</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select name="tipo" id="tipo" class="form-select">
                                <!-- Muestro las opciones de tipo -->
                                <option value="" selected disabled>Selecciona una opción</option>
                                <option value=>Planeta</option>
                                <option value=1>Sistemas estelares</option>
                                <option value=2>Agujeros negros</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="historia" class="form-label">Historia</label>
                            <input type="text" class="form-control" id="historia" name="historia" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="caracteristicas" class="form-label">Caracteristicas</label>
                            <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" step="1" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="img" class="form-label">Img</label>
                            <input type="text" class="form-control" id="img" name="img" required>
                        </div>
                        <!-- Confirmo la inserccion del planeta -->
                        <button type="submit" class="btn btn-success mt-5">Guardar Astro</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>