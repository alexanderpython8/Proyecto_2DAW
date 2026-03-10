@extends('layouts.gestionar')

@section('title', 'Gestion de pagos')

@section('fondo')
    <style>
        body {
            background-image: url("{{ asset('assets/img/mountains-over-two-planets-x4d5uxsdmvxcq1ag.jpg') }}");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Pago</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Pago</div>
        <div class="card-body">

            <div class="row mb-3 me-2 float-end">
                <a href="{{ route('ins_pag') }}" class="btn btn-success">➕ Nuevo Pago</a>
            </div>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Alquiler</th>
                        <th>Compra</th>
                        <th>Monto</th>
                        <th>Fecha Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($pagos as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->astros_usuarios_id }}</td>
                            <td>{{ $p->compras_id }}</td>
                            <td>{{ $p->monto }}€</td>
                            <td>{{ $p->fechaPago }}</td>
                            <td>
                                <!-- Solo disponble la edicion y eliminacion para administradores -->
                                <a href="{{ route('edit_pag', $p->id) }}"
                                class="btn btn-sm btn-warning">✏️</a>

                                <form action="{{ route('drop_pag', $p->id) }}" method="POST">
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

@section('MEliminacion', '¿Seguro que deseas eliminar este Pago?')
