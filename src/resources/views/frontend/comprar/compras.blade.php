<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/back_compras.css') }}">
    <title>Compras</title>
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
        <article>
            <ul>
                @foreach($astros as $astro)
                    @if($astro->estado == 0)
                    <li onclick="mostrarAstro(
                        '{{ $astro->nombre }}',
                        '{{ addslashes($astro->caracteristicas) }}',
                        '{{ asset('storage/' . $astro->img) }}',
                        {{ $astro->id }},
                        '{{ number_format($astro->precio, 2) }}'
                    )" style="cursor:pointer">
                        <div>
                            <img src="{{ asset('storage/' . $astro->img) }}" alt="{{ $astro->nombre }}">
                        </div>
                        <div>
                            <h3>{{ $astro->nombre }}</h3>
                            <p>{{ $astro->caracteristicas }}</p>
                            <strong>{{ number_format($astro->precio, 2) }} €</strong>
                        </div>
                    </li>
                    @endif
                @endforeach
            </ul>
        </article>

        <article>
            <section>
                <ul>
                    <h1 id="detalle-nombre">Selecciona un astro</h1>
                    <p id="detalle-descripcion">Haz clic en cualquier astro de la lista para ver su información aquí.</p>
                    <p id="detalle-precio" style="font-size:1.3rem; font-weight:bold;"></p>

                    <button id="btn-explorar" style="display:none">EXPLORAR</button>

                    @auth
                    <form id="form-carrito" action="" method="POST" style="display:none; margin-top:15px">
                        @csrf
                        <button type="submit">🛒 Añadir al carrito</button>
                    </form>
                    @else
                    <a id="link-login" href="{{ route('login') }}" style="display:none">Inicia sesión para comprar</a>
                    @endauth
                </ul>
            </section>
            <section>
                <img id="detalle-img" src="{{ asset('assets/img/jupiter_principal.webp') }}" alt="">
            </section>
        </article>
    </main>

    <script>
    function mostrarAstro(nombre, caracteristicas, historia, img, id, precio) {
        document.getElementById('detalle-nombre').textContent = nombre;
        document.getElementById('detalle-descripcion').textContent = caracteristicas;
        document.getElementById('detalle-precio').textContent = precio + ' €';
        document.getElementById('detalle-img').src = img;
        document.getElementById('detalle-img').alt = nombre;
        document.getElementById('btn-explorar').style.display = 'inline-block';

        const form = document.getElementById('form-carrito');
        if (form) {
            form.action = '/carrito/agregar/' + id;
            form.style.display = 'block';
        }

        const linkLogin = document.getElementById('link-login');
        if (linkLogin) {
            linkLogin.style.display = 'inline-block';
        }
    }
    </script>
    <footer>
        <article>
            <section>
                <ul>
                    <h2>Productos</h2>
                    <li><a href="{{ route('compras') }}">Comprar</a></li>
                    <li><a href="#">Alquiler</a></li>
                    <li><a href="#">Catálogo</a></li>
                    <li><a href="#">Novedades</a></li>
                </ul>
                <ul>
                    <h2>Universo</h2>
                    <li><a href="#">Planetas</a></li>
                    <li><a href="#">Sistemas estelares</a></li>
                    <li><a href="#">Agujeros negros</a></li>
                </ul>
                <ul>
                    <h2>Acerca de nosotros</h2>
                    <li><p><a href="#">Calle imaginaria</a></p></li>
                    <li><p><a href="#">Información</a></p></li>
                </ul>
            </section>
            <section>
                <ul>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/img/facebook.avif') }}" alt="">
                            Facebook
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/img/insta.avif') }}" alt="">
                            Instagram
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/img/x.avif') }}" alt="">
                            X
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/img/youtube.avif') }}" alt="">
                            YouTube
                        </a>
                    </li>
                </ul>
            </section>
        </article>
        <article>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque facere saepe odit, eum commodi
                repudiandae animi fuga rem corrupti mollitia quisquam sit at quod nobis quo. Pariatur suscipit assumenda excepturi?
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis iusto ipsa inventore
                voluptas aliquid animi veniam sequi dolore id vitae earum, iste, aperiam autem distinctio minus
                voluptatum quisquam similique amet.
            </p>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta omnis quisquam explicabo veniam
                hic cupiditate repellat autem animi consequuntur praesentium? Tempore nobis molestias, incidunt
                aliquid reiciendis quidem cupiditate iste ratione!
            </p>
            <p>&copy; 2026 Alejandro Guaman Zuñiga</p>
        </article>
    </footer>
</body>
</html>
