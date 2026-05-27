@extends('layouts.insertar')

@section('title', 'Insertar Usuarios')

@section('body')
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_usr') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Registro de Usuario</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('save_usr') }}" method="POST">
                    <div class="row">
                        @csrf
                        
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" id="password" name="password" 
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="rol" class="form-label">Rol:</label>
                            <select id="rol" name="rol" class="form-control @error('rol') is-invalid @enderror" required>
                                <option value="">Seleccionar rol</option>
                                <option value="0" {{ old('rol') == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ old('rol') == 0 ? 'selected' : '' }}>Usuario</option>
                            </select>
                            @error('rol')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Confirmo la insercción del usuario -->
                        <button type="submit" class="btn btn-success mt-5">Guardar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
