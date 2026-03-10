@extends('layouts.gestionar')

@section('title', 'Gestion Astros')
@section('fondo')
    <style>
        body {
            background-image: url("{{ asset('assets/img/mountains-over-two-planets-x4d5uxsdmvxcq1ag.jpg') }}");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Astro</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Astros</div>
        <div class="card-body">

            <!-- Iserción de nuevos valores solo par administradores -->
            <div class="row mb-3 me-2 float-end">
                <a href="{{ route('ins_ast') }}" class="btn btn-success">➕ Nuevo Astro</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{session('success')}}</p>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($astros as $ast)
                        <tr>
                            <td>{{ $ast->id }}</td>
                            <td>{{ $ast->nombre }}</td>
                            <td>
                                @if ($ast->tipo == 0)
                                    Planetas
                                @elseif ($ast->tipo == 1)
                                    Sol
                                @else
                                    Galaxia
                                @endif
                            </td>
                            <td>
                                @if ($ast->estado == 0)
                                    Libre
                                @elseif ($ast->estado == 1)
                                    Comprado
                                @else
                                    Alquilado
                                @endif
                            </td>
                            <td>{{ $ast->explotacion }}%</td>
                            <td>{{ $ast->precio }}€</td>
                            <td>
                                <a href="{{ route('edit_ast', $ast->id) }}"
                                class="btn btn-sm btn-warning">✏️</a>

                                <form action="{{ route('drop_ast', $ast->id) }}" method="POST">
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
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Astro?')
