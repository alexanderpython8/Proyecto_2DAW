@extends('layouts.gestionar')

@section('title', 'Gestion Compras')
@section('fondo')
    <style>
        body {
            background-image: url("../img/minimalist-space-3840-x-2183-wallpaper-c27lewilmfd7166e.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Compra</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Compras</div>
        <div class="card-body">

            <!-- Alertas de error  -->
            <?php
                if (isset($_GET["ped"])) {
                    if ($_GET["ped"] == 0) {
                        echo '<div class="alert alert-success">✅ Pedido insertado correctamente.</div>';
                    }
                    if ($_GET["ped"] == 1) {
                        echo '<div class="alert alert-warning">⚠️ El planeta ya esta vendido.</div>';
                    }
                    if ($_GET["ped"] == 2) {
                        echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el pedido.</div>';
                    }
                    if ($_GET["ped"] == 3) {
                        echo '<div class="alert alert-warning">⚠️ El id del cliente no existe.</div>';
                    }
                    if ($_GET["ped"] == 4) {
                        echo '<div class="alert alert-danger">⚠️ El id de planeta no existe.</div>';
                    }
                }
            ?>

            <!-- Iserción de nuevos valores solo par administradores -->
            @if ($rol == 1)
                <div class="row mb-3 me-2 float-end">
                    <a href="{{ route('ins_com') }}" class="btn btn-success">➕ Nuevo Compra</a>
                </div>
            @endif

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID Astro</th>
                        <th>ID Usuario</th>
                        <th>Fecha Compra</th>
                        @if ($rol == 1)
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compra as $c)
                        <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->id_astro }}</td>
                        <td>{{ $c->id_usuario }}</td>
                        <td>{{ $c->fechaClompra }}</td>
                        <td>
                            <!-- Solo disponble la edicion y eliminacion para administradores -->

                            @if ($rol == 1)
                                <a href="edit_usr_mysqli.php?edit={{ $c->id }}"
                                class="btn btn-sm btn-warning">✏️</a>

                                <button type="button"
                                        class="btn btn-danger"
                                        onclick="eliminarCompra('{{ $c->id }}')">
                                    🗑️
                                </button>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Metodo de paginacion de maximo en 10 -->
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar esta Compra?')
