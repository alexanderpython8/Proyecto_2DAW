@extends('layouts.insertar')

@section('title', 'Insertar Alquiler')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_alq') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Alquiler</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('save_alq') }}" method="POST">
                    <div class="row">
                        @csrf

                        <div class="col-md-6 mt-3">
                            <label for="usuarios_id" class="form-label">Clientes (id - nombre)</label>
                            <select name="usuarios_id" id="usuarios_id"
                                class="form-select @error('usuarios_id') is-invalid @enderror" required>
                                <option value="" selected disabled>Selecciona un cliente</option>
                                @if (!empty($usuarios))
                                    @foreach ($usuarios as $usr)
                                        <option value="{{ intval($usr['id']) }}"
                                            {{ old('usuarios_id') == $usr['id'] ? 'selected' : '' }}>
                                            {{ $usr['id'] . ' - ' . $usr['nombre'] }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No hay clientes disponibles</option>
                                @endif
                            </select>
                            @error('usuarios_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="astros_id" class="form-label">Astros disponibles (id - nombre)</label>
                            <select name="astros_id" id="astros_id"
                                class="form-select @error('astros_id') is-invalid @enderror" required>
                                <option value="" selected disabled>Selecciona un astro</option>
                                @if (!empty($astros))
                                    @foreach ($astros as $ast)
                                        <option value="{{ intval($ast['id']) }}"
                                            {{ old('astros_id') == $ast['id'] ? 'selected' : '' }}>
                                            {{ $ast['id'] . ' - ' . $ast['nombre'] }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No hay astros disponibles</option>
                                @endif
                            </select>
                            @error('astros_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" name="fechaInicio" id="fechaInicio"
                                value="{{ old('fechaInicio') }}"
                                class="form-control @error('fechaInicio') is-invalid @enderror"
                                min="{{ date('Y-m-d') }}" required>
                            @error('fechaInicio')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="fechaFin" class="form-label">Fecha de Fin</label>
                            <input type="date" name="fechaFin" id="fechaFin"
                                value="{{ old('fechaFin') }}"
                                class="form-control @error('fechaFin') is-invalid @enderror"
                                min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                            @error('fechaFin')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-5">
                            Guardar alquiler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
