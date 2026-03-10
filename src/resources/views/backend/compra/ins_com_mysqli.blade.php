@extends('layouts.insertar')

@section('title', 'Insertar Compra')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_com') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Compra</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('save_com') }}" method="POST">
                    <div class="row">
                        @csrf

                        <div class="col-md-6 mt-3">
                            <label for="id_cliente" class="form-label">Cliente (id - nombre)</label>
                            <select name="id_cliente" id="id_cliente" 
                                class="form-select @error('id_cliente') is-invalid @enderror" required>
                                <option value="" selected disabled>Selecciona un cliente</option>
                                @if (!empty($clientes))
                                    @foreach ($clientes as $c)
                                        <option value="{{ intval($c['id']) }}"
                                            {{ old('id_cliente') == $c['id'] ? 'selected' : '' }}>
                                            {{ $c['id'] . ' - ' . $c['nombre'] }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No hay clientes disponibles</option>
                                @endif
                            </select>
                            @error('id_cliente')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="id_planeta" class="form-label">Planeta (id - nombre)</label>
                            <select name="id_planeta" id="id_planeta" 
                                class="form-select @error('id_planeta') is-invalid @enderror" required>
                                <option value="" selected disabled>Selecciona un planeta</option>
                                @if (!empty($planetas))
                                    @foreach ($planetas as $p)
                                        <option value="{{ intval($p['id']) }}"
                                            {{ old('id_planeta') == $p['id'] ? 'selected' : '' }}>
                                            {{ $p['id'] . ' - ' . $p['nombre'] }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No hay planetas disponibles</option>
                                @endif
                            </select>
                            @error('id_planeta')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="total" class="form-label">Precio</label>
                            <input type="number" 
                                class="form-control @error('total') is-invalid @enderror" 
                                id="total" name="total" step="1" 
                                value="{{ old('total') }}" required>
                            @error('total')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="descuento" class="form-label">Descuento</label>
                            <input type="number" 
                                class="form-control @error('descuento') is-invalid @enderror" 
                                id="descuento" name="descuento" step="1" 
                                value="{{ old('descuento') }}" required>
                            @error('descuento')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Confirmo para agregar el nuevo pedido -->
                        <button type="submit" class="btn btn-success mt-5">Guardar pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
