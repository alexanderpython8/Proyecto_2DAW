@extends('layouts.gestionar')

@section('title', 'Gestion Astros')
@section('fondo')
    <style>
        body {
            background-image: url("../img/4k-earth-surreal-look-v85atk12miu0j8u8.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Astro</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Astros</div>
        <div class="card-body">

            <!-- Alertas de error  -->
            <?php
                if (isset($_GET["pla"])) {
                    if ($_GET["pla"] == 0) {
                        echo '<div class="alert alert-success">✅ Planeta insertado correctamente.</div>';
                    }
                    if ($_GET["pla"] == 1) {
                        echo '<div class="alert alert-warning">⚠️ El nombre ya existe en la base de datos.</div>';
                    }
                    if ($_GET["pla"] == 2) {
                        echo '<div class="alert alert-danger">❌ Ha ocurrido un error al intentar insertar el planeta.</div>';
                    }
                }
            ?>

            <!-- Iserción de nuevos valores solo par administradores -->
            @if ($rol == 1)
                <div class="row mb-3 me-2 float-end">
                    <a href="{{ route('ins_ast') }}" class="btn btn-success">➕ Nuevo Astro</a>
                </div>
            @endif

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Explotación</th>
                        <th>Precio</th>
                        @if ($rol == 1)
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($astros as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->nombre }}</td>
                            <td>
                                @if ($a->tipo == 0)
                                    Planetas
                                @elseif ($a->tipo == 1)
                                    Sol
                                @else
                                    Galaxia
                                @endif
                            </td>
                            <td>
                                @if ($a->estado == 0)
                                    Libre
                                @elseif ($a->estado == 1)
                                    Comprado
                                @else
                                    Alquilado
                                @endif
                            </td>
                            <td>{{ $a->explotacion }}%</td>
                            <td>{{ $a->precio }}€</td>
                            <td>
                                <!-- Solo disponble la edicion y eliminacion para administradores -->
                                @if ($rol == 1)
                                    <a href="edit_usr_mysqli.php?edit={{ $a->id }}"
                                    class="btn btn-sm btn-warning">✏️</a>

                                    <button type="button"
                                            class="btn btn-danger"
                                            onclick="eliminarAstro('{{ $a->id }}')">
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
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Astro?')
