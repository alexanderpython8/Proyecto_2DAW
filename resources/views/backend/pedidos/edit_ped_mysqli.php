<?php
    // session_start();

    // // Verificacion si es Administrador par poder acceder a esta pagina
    // if(!isset($_SESSION["nombre"]) || $_SESSION["rol"] != 1) {
    //     header("location:../panel.php");
    //     die();
    // }
    
    // include("../db/db.inc");//mysqli

    // $id_pedido = intval($_GET["edit"]);
    // $sql_pedido_actual = "SELECT id_planeta FROM pedidos WHERE id_pedido = $id_pedido";
    // $res_pedido_actual = mysqli_query($conn, $sql_pedido_actual);
    // $pedido_actual = mysqli_fetch_assoc($res_pedido_actual);
    // $id_planeta_actual = $pedido_actual['id_planeta'];

    // // Extraigo solo los planetas que no estan vendidos y tambien  el que esta justo ahora en el pedido por si solo se quiere cambiar el cliente
    // $sql_planetas = "SELECT id, nombre FROM planetas WHERE vendido='N' AND estado = 1 OR id = $id_planeta_actual ORDER BY nombre";
    // $res_planetas = mysqli_query($conn, $sql_planetas);
    // $planetas = [];

    // if ($res_planetas) 
    // {   //Guardo todos en un array
    //     while ($row = mysqli_fetch_assoc($res_planetas)) 
    //     {
    //         $planetas[] = $row;
    //     }
    //     mysqli_free_result($res_planetas);
    // }

    // //Extraigo todos los clientes
    // $sql_clientes = "SELECT id, nombre FROM clientes ORDER BY nombre";
    // $res_clientes = mysqli_query($conn, $sql_clientes);
    // $clientes = [];

    // if ($res_clientes) 
    // {   //Los guardo todos en un array
    //     while ($row = mysqli_fetch_assoc($res_clientes)) 
    //     {
    //         $clientes[] = $row;
    //     }
    //     mysqli_free_result($res_clientes);
    // }

    // if (isset($_POST["accion"]) && $_POST["accion"] == "editar") 
    // {// cuando pulse actualizar
        
    //     if(isset($_POST["id_planeta"]) && !empty($_POST["id_planeta"])) 
    //     {
    //         // Extraigo los datos necesarios para la edición de los datos de la tabla
    //         $id_planeta = intval(($_POST["id_planeta"]));
    //         $id_cliente = intval(($_POST["id_cliente"]));
    //         $total = intval(($_POST["total"]));
    //         $id_pedido = intval($_POST["id_pedido"]);
    //         $descuento = intval($_POST["descuento"]);
            

    //         $sql_planeta = "SELECT id_pedido FROM pedidos WHERE id_planeta='$id_planeta' AND id_pedido != $id_pedido";
    //         $res = mysqli_query($conn, $sql_planeta);
            
    //         if (mysqli_num_rows($res) > 0)
    //         {
    //             header("location:gestion_pedidos.php?ped=1");
    //             die();
    //         }

    //         // comprobar cliente
    //         $sql_cliente = "SELECT id FROM clientes WHERE id = $id_cliente";
    //         $res_cliente = mysqli_query($conn, $sql_cliente);
    //         if (mysqli_num_rows($res_cliente) == 0) {
    //             header("location:gestion_pedidos.php?ped=3");
    //             die();
    //         }

    //         // comprobar planeta
    //         $sql_planeta = "SELECT id FROM planetas WHERE id = $id_planeta";
    //         $res_planeta = mysqli_query($conn, $sql_planeta);
    //         if (mysqli_num_rows($res_planeta) == 0) {
    //             header("location:gestion_pedidos.php?ped=4");
    //             die();
    //         }
            
    //         // Aplico el descuento
    //         $totalDescuento = $total * (1 - $descuento / 100);

    //         // Actualizo el pedido
    //         $sql = "UPDATE pedidos SET id_planeta = '$id_planeta', id_cliente = '$id_cliente', total = '$total', descuento = '$descuento'
    //             WHERE id_pedido = $id_pedido";
            
    //         //Actualizo el planeta que se eligio como vendido, para que no se pueda volver a pedir
    //         $sql_update = "UPDATE planetas SET vendido='V' WHERE id=$id_planeta";
    //         mysqli_query($conn, $sql_update);

    //         // El que fue anterior a la actualizacion se pasara a no vendido para poder ser pedido
    //         $sql_update_planeta_anteriro = "UPDATE planetas SET vendido='N' WHERE id=$id_planeta_actual";
    //         mysqli_query($conn, $sql_update_planeta_anteriro);
            
    //         if (mysqli_query($conn, $sql)) 
    //         {
    //             header("location:gestion_pedidos.php?ped=0"); //Si todo ok
    //         }
    //         else 
    //         {
    //             header("location:gestion_pedidos.php?ped=2"); //Si no actualizo
    //         }
    //         die();
    //     }
    // }
    // if(!isset($_GET["edit"])) {
    //     header("location:gestion_pedidos.php");
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
        <a href="./gestion_pedidos.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Pedidos con MySQL</h2>
            </div>
            <div class="card-body">

            <?php
                // $id_pedido = intval($_GET["edit"]);
                // $sql = "SELECT * FROM pedidos WHERE id_pedido = $id_pedido"; // consulta para obtener los datos del pedido
                // $res = mysqli_query($conn, $sql); // ejecutar consulta
                // if (mysqli_num_rows($res) > 0) { // comprobar si hay resultado
                //     $ped = mysqli_fetch_assoc($res); // crear un array asociativo con los datos del pedido
                // }
                // else {
                //     header("location:gestion_pedidos.php");
                //     die();
                // }
            ?>

                <form method="POST">
                    <input type="hidden" name="id_pedido" value="<?=$id_pedido;?>">
                    <input type="hidden" name="accion" value="editar">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="id_cliente" class="form-label">Cliente (id - nombre)</label>
                            <select name="id_cliente" id="id_cliente" class="form-select" required>
                                <option value="" selected disabled>Selecciona un cliente</option>
                                <!-- Confirmo que el array no esta vacio -->
                                <?php if (!empty($clientes)): ?> 
                                    <!-- Muestro todos los clientes disponibles con el id y el nombre -->
                                    <?php foreach ($clientes as $c): ?>
                                        <option value="<?php echo intval($c['id']); ?>">
                                            <!-- Imprimo el array en la seleccion -->
                                            <?php echo htmlspecialchars($c['id'] . ' - ' . $c['nombre'], ENT_QUOTES); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <!-- Si no hay ningun cliente -->
                                <?php else: ?>
                                    <option value="" disabled>No hay clientes disponibles</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="id_planeta" class="form-label">Planeta (id - nombre)</label>
                            <select name="id_planeta" id="id_planeta" class="form-select" required>
                                <option value="" selected disabled>Selecciona un planeta</option>
                                <!-- Confirmo que el array no esta vacio -->
                                <?php if (!empty($planetas)): ?>
                                    <!-- Muestro todos los planetas disponibles con el id y el nombre -->
                                    <?php foreach ($planetas as $p): ?>
                                        <option value="<?php echo intval($p['id']); ?>">
                                            <!-- Imprimo el array en la seleccion -->
                                            <?php echo htmlspecialchars($p['id'] . ' - ' . $p['nombre'], ENT_QUOTES); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <!-- Si no hay ningun planeta -->
                                <?php else: ?>
                                    <option value="" disabled>No hay planetas disponibles</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="total" class="form-label">Precio:</label>
                            <input type="number" class="form-control" id="total" name="total" step="0.01" value="<?= $ped["total"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="descuento" class="form-label">Descuento:</label>
                            <input type="number" class="form-control" id="descuento" name="descuento" step="1" value="<?= $ped["descuento"] ?>" required>
                        </div>
                        <!-- Confirmo la actualizacion del pedido -->
                        <button type="submit" class="btn btn-success mt-5">Actualizar pedidos</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>