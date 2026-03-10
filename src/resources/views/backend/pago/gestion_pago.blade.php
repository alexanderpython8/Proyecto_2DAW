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

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Astro</th>
                        <th>Usuario</th>
                        <th>Monto</th>
                        <th>Fecha Pago</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($pagos as $p)
                            <tr>
                                <td>{{ $p->id }}</td>

                                <td>
                                    @php $tipo = $p->tipo ?? ($p->compras_id ? 'compra' : 'alquiler') @endphp
                                    @if($tipo === 'compra')
                                        <span class="badge-compra">Compra</span>
                                    @else
                                        <span class="badge-alquiler">Alquiler</span>
                                    @endif
                                </td>

                                <td>
                                    @if($p->compras_id)
                                        {{ $astros->find($compras->find($p->compras_id)->astros_id)->nombre ?? '—' }}
                                    @else
                                        {{ $astros->find($alquileres->find($p->astros_usuarios_id)->astros_id)->nombre ?? '—' }}
                                    @endif
                                </td>
                                <td>
                                    @if($p->compras_id)
                                        {{ $usuarios->find($compras->find($p->compras_id)->usuarios_id)->nombre ?? '—' }}
                                    @else
                                        {{ $usuarios->find($alquileres->find($p->astros_usuarios_id)->usuarios_id)->nombre ?? '—' }}
                                    @endif
                                </td>

                                <td>{{ number_format($p->monto, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->fechaPago)->toDateString() }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('MEliminacion', '¿Seguro que deseas eliminar este Pago?')
