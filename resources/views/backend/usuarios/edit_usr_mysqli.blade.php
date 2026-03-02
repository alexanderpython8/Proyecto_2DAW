@extends('layouts.editar')

@section('title', 'Editar Usuario')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_usr') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Edicion de Usuario</h2>
            </div>
            <div class="card-body">

            <?php
                // $id = intval($_GET["edit"]);
                // $sql = "SELECT * FROM usuarios WHERE id = $id"; // consulta para obtener los datos del usuario
                // $res = mysqli_query($conn, $sql); // ejecutar consulta
                // if (mysqli_num_rows($res) > 0) { // comprobar si hay resultado
                //     $sis = mysqli_fetch_assoc($res); // crear un array asociativo con los datos del usuario
                // }
                // else {
                //     header("location:gestion_usuarios.php");
                //     die();
                // }
            ?>

                <form method="POST">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <input type="hidden" name="accion" value="editar">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $sis["nombre"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $sis["email"] ?>" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="rol" class="form-label">Rol:</label>
                            <select name="rol" id="rol" class="form-select" required>
                                <option value="default" selected disabled>Selecciona una opción</option>   l
                                    <!-- Muestra las opciones de roles que serán Administrador y Usuario -->
                                    <?php
                                        // $rol = $sis['rol'];

                                        // echo $rol == 1 ? '<option value=1 selected> Administrador </option>' : '<option value=1> Administrador </option>';
                                        // echo $rol == 0 ? '<option value=0 selected> Usuario </option>' : '<option value=0> Usuario </option>';
                                    ?>
                            </select>
                        </div>
                        <!-- Confirmo la actualización de usuario -->
                        <button type="submit" class="btn btn-success mt-5">Actualizar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
