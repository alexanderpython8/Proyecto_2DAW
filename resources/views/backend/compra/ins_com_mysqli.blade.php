@extends('layouts.insertar')

@section('title', 'Insertar Compra')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="./gestion_pedidos.php" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Compra</h2>
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
@endsection
