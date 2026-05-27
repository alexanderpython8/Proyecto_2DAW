<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/back_compras.css') }}">
    <title>Mi Carrito</title>
    <style>
        .carrito-container { color: #e8edff; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .carrito-item { color: #e8edff; display: flex; align-items: center; gap: 20px; border-bottom: 1px solid #ccc; padding: 20px 0; }
        .carrito-item img { width: 100px; height: 100px; object-fit: cover; border-radius: 8px; }
        .carrito-total { text-align: right; font-size: 1.5rem; margin-top: 30px; }
        .btn-comprar { background: #000; color: #fff; padding: 14px 40px; font-size: 1.1rem; border: none; cursor: pointer; border-radius: 6px; }
        .btn-eliminar { background: #e00; color: #fff; padding: 6px 14px; border: none; cursor: pointer; border-radius: 4px; }
        .vacio { text-align: center; padding: 60px 0; font-size: 1.3rem; color: #888; }
    </style>
</head>
<body>
<header>
    <div>
        <ul>
            <li><h1><a href="{{ route('welcome') }}">BIG BANG</a></h1></li>
            <li>
                <a href="{{ route('welcome') }}"><strong>Página principal</strong></a>
                <div>
                    <a href="#">Catalogo</a>
                    <ul>
                        <li><a href="{{ route('compras') }}">Comprar</a></li>
                        <li><a href="#">Alquilar</a></li>
                        <li><a href="#">Catálogo</a></li>
                        <li><a href="#">Nuevo</a></li>
                    </ul>
                </div>
                <a href="#">Acerca de nosotros</a>
                @auth
                    <a style="font-size: 25px" href="{{ route('carrito.ver') }}">🛒</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit">Cerrar sesion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Iniciar sesion</a>
                @endauth
            </li>
            <li>
                <button><img src="{{ asset('assets/img/buscador.png') }}" alt="Buscador"></button>
                <input type="text" id="busqueda" placeholder="Buscar">
            </li>
        </ul>
    </div>
</header>

<main>
    <div class="carrito-container">
        <h1>Mi Carrito</h1>

        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p style="color:red">{{ session('error') }}</p>
        @endif

        @if(empty($carrito))
            <div class="vacio">Tu carrito está vacío.</div>
        @else
            @foreach($carrito as $id => $item)
            <div class="carrito-item">
                <img src="{{ asset('storage/' . $item['img']) }}" alt="{{ $item['nombre'] }}">
                <div style="flex:1">
                    <h3>{{ $item['nombre'] }}</h3>
                    <p>{{ $item['caracteristicas'] }}</p>
                    <strong>{{ number_format($item['precio'], 2) }} €</strong>
                </div>
                <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-eliminar">Eliminar</button>
                </form>
            </div>
            @endforeach

            <div class="carrito-total">
                <strong>Total: {{ number_format($total, 2) }} €</strong>
            </div>

            <form action="{{ route('carrito.comprar') }}" method="POST" style="text-align:right; margin-top:20px">
                @csrf
                <button class="btn-comprar">Confirmar compra</button>
            </form>
        @endif
    </div>
</main>
</body>
</html>