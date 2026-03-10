@extends('layouts.insertar')

@section('title', 'Insertar Astros')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_ast') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Planetas con MySQL</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('save_ast') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select name="tipo" id="tipo" class="form-select @error('tipo') is-invalid @enderror" required>
                                <option value="" selected disabled>Selecciona una opción</option>
                                <option value="0" {{ old('tipo') == 0 ? 'selected' : '' }}>Planeta</option>
                                <option value="1" {{ old('tipo') == 1 ? 'selected' : '' }}>Sistemas estelares</option>
                                <option value="2" {{ old('tipo') == 2 ? 'selected' : '' }}>Agujeros negros</option>
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="historia" class="form-label">Historia</label>
                            <textarea class="form-control @error('historia') is-invalid @enderror" 
                                id="historia" name="historia" rows="3" required>{{ old('historia') }}</textarea>
                            @error('historia')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="caracteristicas" class="form-label">Características</label>
                            <textarea class="form-control @error('caracteristicas') is-invalid @enderror" 
                                id="caracteristicas" name="caracteristicas" rows="3" required>{{ old('caracteristicas') }}</textarea>
                            @error('caracteristicas')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control @error('precio') is-invalid @enderror" 
                                id="precio" name="precio" step="0.01" value="{{ old('precio') }}" required>
                            @error('precio')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="img" class="form-label">Imagen</label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" 
                                id="img" name="img" accept="image/*" required>
                            @error('img')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirmo la inserccion del astro -->
                        <button type="submit" class="btn btn-success mt-5">
                            Guardar Astro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
