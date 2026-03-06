@extends('layouts.gestionar')

@section('title', 'Gestion Usuarios')
@section('fondo')
    <style>
        body {
            background-image: url("..assets/img/asteroids-of-solar-system-hd-lf9eaj5sxtwrjw7i.jpg");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Usuarios</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Usuarios</div>
        <div class="card-body">

            <div class="row mb-3 me-2 float-end">
                <a href="{{ route('ins_usr') }}" class="btn btn-success">➕ Nuevo Usuario</a>
            </div>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usr)
                    <tr>
                        <td>{{ $usr->id }}</td>
                        <td>{{ $usr->nombre }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->rol }}</td>
                        <td>
                            <a href="{{ route('edit_usr', $usr->id) }}"
                            class="btn btn-sm btn-warning">✏️</a>

                            <form action="{{ route('drop_usr', $usr->id) }}" method="POST">
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

@section('MEliminacion', '¿Seguro que deseas eliminar este Usuario?')
