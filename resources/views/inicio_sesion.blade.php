<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo_iniciosesion.css') }}">
    <title>Iniciar sesión</title>
</head>
<body>
    <main>
        <h1><a href="{{ route('welcome') }}">BIG BANG</a></h1>
        <form action="" method="POST">
            <h2>INICIAR SESIÓN</h2>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>
            <button type="submit" id="submit" name="submit">Acceder</button>
            <a href="#">¿Problemas al iniciar sesión?</a>
            <p>¿No tienes una cuenta? <a href="#">Crear cuenta</a></p>
            <a href="{{ route('panel_control') }}">Panel de gestion</a>
        </form>
    </main>
    <footer>
        <article>
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