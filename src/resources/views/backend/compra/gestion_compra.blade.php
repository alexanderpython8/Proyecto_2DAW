@extends('layouts.gestionar')

@section('title', 'Gestion Compras')
@section('fondo')
    <style>
        body {
            background-image: url("{{ asset('assets/img/mountains-over-two-planets-x4d5uxsdmvxcq1ag.jpg') }}");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Compra</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Compras</div>
        <div class="card-body">

            <!-- Iserción de nuevos valores solo par administradores -->
            <div class="row mb-3 me-2 float-end">
                <a href="{{ route('ins_com') }}" class="btn btn-success">➕ Nuevo Compra</a>
            </div>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID Astro</th>
                        <th>ID Usuario</th>
                        <th>Fecha Compra</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $com)
                        <tr>
                        <td>{{ $com->id }}</td>
                        <td>{{ $com->astros_id }}</td>
                        <td>{{ $com->usuarios_id }}</td>
                        <td>{{ $com->fechaCompra }}</td>
                        <td>
                            <a href="{{ route('edit_com', $com->id) }}"
                            class="btn btn-sm btn-warning">✏️</a>

                            <form action="{{ route('drop_com', $com->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger">
                                    🗑️
                                </button>
                            </form>
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
