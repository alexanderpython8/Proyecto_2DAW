@extends('layouts.editar')

@section('title', 'Editar Astros')

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
                <h2 class="text-light">Registro de Astros</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('update_ast', $astros->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="accion" value="editar">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$astros->nombre}}" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select name="tipo" id="tipo" class="form-select">
                                <option value="" selected disabled>Selecciona una opción</option>
                                <option value=0 @selected($astros->tipo == 0)>Planeta</option>
                                <option value=1 @selected($astros->tipo == 1)>Sistemas estelares</option>
                                <option value=2 @selected($astros->tipo == 2)>Agujeros negros</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="historia" class="form-label">Historia</label>
                            <input type="text" class="form-control" id="historia" name="historia" value="{{$astros->historia}}" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="caracteristicas" class="form-label">Caracteristicas</label>
                            <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" value="{{$astros->caracteristicas}}" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="explotacion" class="form-label">Explotacion</label>
                            <input type="number" class="form-control" id="explotacion" name="explotacion" step="1" value="{{$astros->explotacion}}" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" step="1" value="{{$astros->precio}}" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="img" class="form-label">Img</label>
                            <input type="file" class="form-control" id="img" name="img" accept="image/*" value="{{$astros->img}}">
                        </div>
                        <!-- Confirmo la actualización -->
                        <button type="submit" class="btn btn-success mt-5">Actualizar Astro</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
