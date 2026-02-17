<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo_compras.css') }}">
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
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li>
                    <button><img src="{{ asset('img/buscador.png') }}" alt="Buscador"></button>
                    <input type="text" id="busqueda" placeholder="Buscar">
                </li>
            </ul>
        </div>
    </header>
    <main>
        <article>
            <ul>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/jupiter.jpg') }}" alt="">
                        </div>
                        <div>
                            <h3>Júpiter</h3>
                            <p>Protector terrestre</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/Gemini_Generated_Image_bwq4xobwq4xobwq4.png') }}" alt="">
                        </div>
                        <div>
                            <h3>Alfa Centauri A</h3>
                            <p>Sistema estelar</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/urano.jpg') }}" alt="">
                        </div>
                        <div>
                            <h3>Urano</h3>
                            <p>Atmósfera gélida</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/planetas.jpeg') }}" alt="">
                        </div>
                        <div>
                            <h3>Plutón</h3>
                            <p>Enano terrestre</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/mercurio.jpg') }}" alt="">
                        </div>
                        <div>
                            <h3>Mercurio</h3>
                            <p>Sin atmósfera</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/agujeronegro.webp') }}" alt="">
                        </div>
                        <div>
                            <h3>Cygnus X-1</h3>
                            <p>Densidad infinita</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/neptuno.jpg') }}" alt="">
                        </div>
                        <div>
                            <h3>Neptuno</h3>
                            <p>Gigante helado</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/saturno.jpg') }}" alt="">
                        </div>
                        <div>
                            <h3>Saturno</h3>
                            <p>Anillos visibles</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <img src="{{ asset('img/proximacentaurib.jpg') }}" alt="">
                        </div>
                        <div>
                            <h3>Próxima Centauri B</h3>
                            <p>Posiblemente rocoso</p>
                        </div>
                    </a>
                </li>
            </ul>
        </article>
        <article>
            <section>
                <ul>
                    <h1>Júpiter</h1>
                    <p>Es el gigante de gas que domina el sistema solar. Tan grande que en su interior cabrían 1.300 
                        Tierras, destaca por sus coloridas bandas de nubes y su legendaria tormenta, la Gran Mancha Roja.
                    </p>

                    <button>EXPLORAR</button>

                    <li><a href="#">Estado del producto →</a></li>
                    <li><a href="#">Comprar producto →</a></li>
                    <li><a href="#">Más acerca del producto →</a></li>
                    <li><a href="#">Complementos del producto →</a></li>
                </ul>
            </section>
            <section>
                <img src="{{ asset('img/jupiter_principal.webp') }}" alt="">
            </section>
        </article>
    </main>
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
                    <li></li>
                    <li><p><a href="#">Calle imaginaria</a></p></li>
                    <li><p><a href="#">Información</a></p></li>
                </ul>
            </section>
            <section>
                <ul>
                    <li>
                        <a href="#">
                            <img src="{{ asset('img/facebook.avif') }}" alt="">
                            Facebook
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('img/insta.avif') }}" alt="">
                            Instagram
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('img/x.avif') }}" alt="">
                            X
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('img/youtube.avif') }}" alt="">
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
