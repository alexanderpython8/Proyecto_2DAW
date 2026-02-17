<?php
    // session_start();

    // // Verificacion si es Administrador par poder acceder a esta pagina
    // if(!isset($_SESSION["nombre"]) || $_SESSION["rol"] != 1) {
    //     header("location:../panel.php");
    //     die();
    // }
    
    // include("../db/db.inc");//mysqli
    
    // if(isset($_POST["nombre"]) && !empty($_POST["nombre"])) 
    // {
    //     //Extraigo todos los valores necesarios para la insercion de la tabla
    //     $nombre = htmlspecialchars(($_POST["nombre"]));
    //     $email = htmlspecialchars(($_POST["email"]));
    //     $password = $_POST["password"];
    //     $rol = intval(($_POST["rol"]));

    //     // Confirmo que no existe ningun email igual
    //     $sql_email = "SELECT * FROM usuarios WHERE email='$email'";
    //     $res = mysqli_query($conn, $sql_email);
        
    //     if (mysqli_num_rows($res) > 0)
    //     {
    //         header("location:gestion_usuarios.php?sis=1");
    //         die();
    //     }
    //     // Paso la contraseña a incriptada
    //     $pass_encriptada = password_hash($password, PASSWORD_DEFAULT);

    //     // Inserto los nuevos datos a la tabla
    //     $sql = "INSERT INTO usuarios (email, password, nombre, rol) 
    //         VALUES ('$email', '$pass_encriptada', '$nombre', '$rol');";
        
        
    //     if (mysqli_query($conn, $sql)) 
    //     {
    //         header("location:gestion_usuarios.php?sis=0");
    //     }
    //     else 
    //     {
    //         header("location:gestion_usuarios.php?sis=2");
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
        <a href="./gestion_usuarios.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Usuario con MySQL</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="rol" class="form-label">Rol:</label>
                            <select name="rol" id="rol" class="form-select">
                                <!-- Muestra las opciones de roles que serán Administrador y Usuario -->
                                <option value="default" selected disabled>Selecciona una opción</option>
                                <option value=1>Administrador</option>
                                <option value=0>Usuario</option>
                            </select>
                        </div>
                        <!-- Confirmo la insercción del usuario -->
                        <button type="submit" class="btn btn-success mt-5">Guardar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>