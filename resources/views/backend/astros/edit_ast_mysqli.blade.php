@extends('layouts.editar')

@section('title', 'Editar Astros')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="./gestion_planetas.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Planeta con MySQL</h2>
            </div>
            <div class="card-body">

            <?php
                $id = intval($_GET["edit"]);
                $sql = "SELECT * FROM planetas WHERE id = $id"; // consulta para obtener los datos del planeta
                $res = mysqli_query($conn, $sql); // ejecutar consulta
                if (mysqli_num_rows($res) > 0) { // comprobar si hay resultado
                    $pla = mysqli_fetch_assoc($res); // crear un array asociativo con los datos del planeta
                }
                else {
                    header("location:gestion_planetas.php");
                    die();
                }
            ?>

                <form method="POST">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <input type="hidden" name="accion" value="editar">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $pla["nombre"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="descripcion" class="form-label">Descripcion:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $pla["descripcion"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="masa" class="form-label">Masa:</label>
                            <input type="text" class="form-control" id="masa" name="masa" value="<?= $pla["masa"] ?>" required>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="distancia" class="form-label">Distancia:</label>
                            <input type="number" class="form-control" id="distancia" name="distancia" step="0.01" value="<?= $pla["distancia"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" class="form-control" id="precio" name="precio" step="1" value="<?= $pla["precio"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="id_sistema" class="form-label">Sistema (id - nombre)</label>
                            <select name="id_sistema" id="id_sistema" class="form-select" required>
                                <option value="" selected disabled>Selecciona un sistema</option>
                                <!-- Verifico si el array no esta vacio -->
                                <?php if (!empty($sistemas)): ?>
                                    <!-- Paso por todo el array de sistemas -->
                                    <?php foreach ($sistemas as $s): ?>
                                        <option value="<?php echo intval($s['id_sistema']); ?>">
                                            <!-- Muestro el id y nombre del sistema a elegir -->
                                            <?php echo htmlspecialchars($s['id_sistema'] . ' - ' . $s['nombre'], ENT_QUOTES); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <!-- Si esta vacio muestro el mensaje -->
                                <?php else: ?>
                                    <option value="" disabled>No hay sistemas disponibles</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <!-- Confirmo la actualización -->
                        <button type="submit" class="btn btn-success mt-5">Actualizar Planetas</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
