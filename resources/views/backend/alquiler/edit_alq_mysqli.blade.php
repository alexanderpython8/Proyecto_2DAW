@extends('layouts.editar')

@section('title', 'Editar Alquiler')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="./gestion_clientes.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Cliente con MySQL</h2>
            </div>
            <div class="card-body">

            <?php
                // $id = intval($_GET["edit"]);
                // $sql = "SELECT * FROM clientes WHERE id = $id"; // consulta para obtener los datos del cliente
                // $res = mysqli_query($conn, $sql); // ejecutar consulta
                // if (mysqli_num_rows($res) > 0) { // comprobar si hay resultado
                //     $cli = mysqli_fetch_assoc($res); // crear un array asociativo con los datos del cliente
                // }
                // else {
                //     header("location:gestion_clientes.php");
                //     die();
                // }
            ?>

                <form method="POST">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <input type="hidden" name="accion" value="editar">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $cli["nombre"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="apellidos" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $cli["apellidos"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $cli["email"] ?>" required>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="direccion" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $cli["direccion"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="codpostal" class="form-label">Codigo Postal:</label>
                            <input type="text" class="form-control" id="codpostal" name="codpostal" value="<?= $cli["codpostal"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="poblacion" class="form-label">Poblacion:</label>
                            <input type="text" class="form-control" id="poblacion" name="poblacion" value="<?= $cli["poblacion"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="provincia" class="form-label">Provicia:</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" value="<?= $cli["provincia"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="genero" class="form-label">Genero:</label>
                            <select name="genero" id="genero" class="form-select" required>
                                <option value="default" selected disabled>Selecciona una opción</option>
                                    <!-- Muestrro las opciones del genero que seran Masculino, Femenino y Otro -->
                                    <?php
                                        $genero = $cli['genero'];

                                        echo $genero == 'M' ? '<option value="M" selected> Masculino </option>' : '<option value="M"> Masculino </option>';
                                        echo $genero == 'F' ? '<option value="F" selected> Femenino </option>' : '<option value="F"> Femenino </option>';
                                        echo $genero == 'O' ? '<option value="O" selected> Otro </option>' : '<option value="O"> Otro </option>';
                                    ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-5">Actualizar cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

