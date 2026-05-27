@extends('layouts.gestionar')

@section('title', 'Gestion Alquiler')
@section('fondo')
    <style>
        body {
            background-image: url("{{ asset('assets/img/mountains-over-two-planets-x4d5uxsdmvxcq1ag.jpg') }}");
        }
    </style>
@endsection

@section('principal')
    <h2 class="text-center mb-4" style="padding-right: 400px;">📋 Gestión de Alquiler</h2>

    <div class="card shadow" style="max-width: 1500px; width: 100%;">
        <div class="card-header bg-primary text-white">📋 Lista de Alquileres</div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{session('success')}}</p>
                </div>
            @endif

            <div class="row mb-3 me-2 float-end">
                <a href="{{ route('ins_alq') }}" class="btn btn-success">➕ Nuevo Alquiler</a>
            </div>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Astro</th>
                        <th>Usuario</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alquiler as $alq)
                        <tr>
                            <td>{{ $alq->id }}</td>
                            <td>{{ $alq->astros_id }} - {{ $astros->find($alq->astros_id)->nombre }}</td>
                            <td>{{ $alq->usuarios_id }} - {{ $usuarios->find($alq->usuarios_id)->nombre }}</td>
                            <td>{{ \Carbon\Carbon::parse($alq->fechaInicio)->toDateString() }}</td>
                            <td>{{ \Carbon\Carbon::parse($alq->fechaFin)->toDateString() }}</td>
                            <td>
                                <form action="{{ route('drop_alq', $alq->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
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

@section('MEliminacion', '¿Seguro que deseas eliminar este Alquiler?')
