<?php
    // session_start();

    // // Verificacion si es Administrador par poder acceder a esta pagina
    // if(!isset($_SESSION["nombre"]) || $_SESSION["rol"] != 1) {
    //     header("location:../panel.php");
    //     die();
    // }
    // include("../db/db.inc");//mysqli

    // // Extraigo solo los planetas no vendidos
    // $sql_planetas = "SELECT id, nombre FROM planetas WHERE vendido='N' ORDER BY nombre";
    // $res_planetas = mysqli_query($conn, $sql_planetas);
    // $planetas = [];

    // if ($res_planetas) 
    // {
    //     while ($row = mysqli_fetch_assoc($res_planetas)) 
    //     {
    //         $planetas[] = $row;
    //     }
    //     mysqli_free_result($res_planetas);
    // }

    // //Extraigo los clientes
    // $sql_clientes = "SELECT id, nombre FROM clientes ORDER BY nombre";
    // $res_clientes = mysqli_query($conn, $sql_clientes);
    // $clientes = [];

    // if ($res_clientes) 
    // {
    //     while ($row = mysqli_fetch_assoc($res_clientes)) 
    //     {
    //         $clientes[] = $row;
    //     }
    //     mysqli_free_result($res_clientes);
    // }

    // if(isset($_POST["id_planeta"]) && !empty($_POST["id_planeta"])) 
    // {
    //     //Extraigo todos los valores necesarios para la insercion de la tabla
    //     $id_planeta = intval($_POST["id_planeta"]);
    //     $id_cliente = intval($_POST["id_cliente"]);
    //     $total = intval($_POST["total"]);
    //     $descuento = intval($_POST["descuento"]);

    //     //Verifico si no hay un pedido igual
    //     $sql_planeta = "SELECT * FROM pedidos WHERE id_planeta='$id_planeta'";
    //     $res = mysqli_query($conn, $sql_planeta);

    //     if (mysqli_num_rows($res) > 0) 
    //     {
    //         header("location:gestion_pedidos.php?ped=1");
    //         die();
    //     }

    //     if (count($clientes) == 0)
    //     {
    //         header("location:gestion_pedidos.php?ped=3");
    //         die();
    //     }

    //     if (count($planetas) == 0) 
    //     {
    //         header("location:gestion_pedidos.php?ped=4");
    //         die();
    //     }

    //     //Calculo el precio total con el descuento
    //     $totalDescuento = $total * (1 - $descuento / 100);

    //     //Inserto el nuevo pedido
    //     $sql = "INSERT INTO pedidos(id_planeta, id_cliente, total, descuento)
    //             VALUES ('$id_planeta', '$id_cliente', '$totalDescuento', '$descuento')";

    //     //Actualizo el planeta elegido a estado vendidox
    //     $sql_update = "UPDATE planetas SET vendido='V' WHERE id=$id_planeta";
    //     mysqli_query($conn, $sql_update);

    //     if (mysqli_query($conn, $sql)) 
    //     {
    //         header("location:gestion_pedidos.php?ped=0");
    //     } 
    //     else 
    //     {
    //         header("location:gestion_pedidos.php?ped=2");
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
                <form method="POST">
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
                                    <!-- Muestro todos los clientes disponibles con el id y el nombre -->
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
                            <label for="total" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="total" name="total" step="1" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="descuento" class="form-label">Descuento</label>
                            <input type="number" class="form-control" id="descuento" name="descuento" step="1" required>
                        </div>
                        <!-- Confirmo para agregar el nuevo pedido -->
                        <button type="submit" class="btn btn-success mt-5">Guardar pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>