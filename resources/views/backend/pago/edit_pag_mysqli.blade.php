@extends('layouts.editar')

@section('title', 'Editar Pago')

@section('body')
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
@endsection
