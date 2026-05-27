@extends('layouts.editar')

@section('title', 'Editar Usuario')

@section('body')
    <!-- Boton para volver a la gestión -->
    <div class="card-header bg-primary d-flex align-items-center">
        <a href="{{ route('gestion_usr') }}" class="btn-back">
            ⬅ Volver
        </a>
    </div>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-light">Edicion de Usuario</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('update_usr', $usuarios->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="accion" value="editar">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$usuarios->nombre}}" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$usuarios->email}}" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="rol" class="form-label">Rol:</label>
                            <select name="rol" id="rol" class="form-select">
                                <option value="default" selected disabled>Selecciona una opción</option>
                                <option value=1 @selected($usuarios->rol == 1)>Administrador</option>
                                <option value=0 @selected($usuarios->rol == 0)>Usuario</option>
                            </select>
                        </div>
                        <!-- Confirmo la actualización de usuario -->
                        <button type="submit" class="btn btn-success mt-5">Actualizar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
