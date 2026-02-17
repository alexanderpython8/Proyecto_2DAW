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
        <div>
            <?php
                // session_start();
                
                // if (isset($_POST["email"]) && !empty($_POST["email"]) &&
                //     filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
                // {

                //     if (isset($_POST["password"]) && !empty($_POST["password"])) 
                //     {

                //         $email = trim($_POST["email"]);
                //         $password = $_POST["password"];
                        
                //         $sql = "SELECT * FROM usuarios WHERE email = ?";
                //         $stmt= $conn->prepare($sql);
                //         $stmt->bind_param("s", $email);

                //         $stmt->execute();

                //         $res = $stmt->get_result();

                //         $datos = $res->fetch_assoc();

                //         if ($datos && password_verify($password, $datos["password"])) 
                //         {
                //                 $_SESSION["nombre"] = $datos["nombre"];
                //                 $_SESSION["rol"] = $datos["rol"];
                //                 $_SESSION["img"] = $datos["img"];
                //                 $_SESSION["email"] = $datos["email"];

                //                 //Creo una instancia; con `true` activamos excepciones
                //                 $mail = new PHPMailer(true);
                //                 try {
                //                 $mail->isSMTP();
                //                 $mail->Host = 'smtp.gmail.com';
                //                 $mail->SMTPAuth = true;
                //                 $mail->Username = 'alejandromialola@gmail.com';
                //                 //Esta pass se crea desde tu cuenta de Google, sólo si tienes activado el
                //                 //inicio en 2 pasos; desde -> https://myaccount.google.com/apppasswords.
                //                 $mail->Password = 'eowd hwqi idaj vfqm';
                //                 $mail->SMTPSecure = 'tls';
                //                 $mail->Port = 587;
                //                 $mail->setFrom('alejandromialola@gmail.com', 'Alejandro admin');
                //                 $mail->addAddress('alejandromialola@gmail.com');
                //                 $mail->isHTML(true);
                //                 $mail->Subject = 'Correo HTML con PHPMailer';
                //                 $mail->Body = '
                //                     <h1>Inicio de sesion</h1>
                //                     <p>Se ha iniciado una sesion en Big Bang</p>';
                //                 $mail->send();
                //                 echo 'Correo enviado correctamente';
                //             } 
                //             catch (Exception $e) 
                //             {
                //                 echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
                //             }

                //             header("location: panel.php");
                //             die();
                //         }
                //         else 
                //         { 
                //             // Si no existe el email o contraseña incorrectos
                //             echo '<div class="alert alert-warning">⚠️ El email y la contraseña NO existen.</div>';
                //         }

                //     } 
                //     else 
                //     { 
                //         // Password vacío o no enviado
                //         echo '<div class="alert alert-warning">⚠️ Error en el campo Password.</div>';
                //     }

                // }
                //  else 
                // { 
                //     // Email no válido
                //     if (isset($_POST["email"])) 
                //     {
                //         echo '<div class="alert alert-warning">⚠️ El email no es válido.</div>';
                //     }
                // }
            ?>
            <form action="{{ route('login.post') }}" method="POST">
                <h2>INICIAR SESIÓN</h2>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Acceder</button>
                <a href="#">¿Problemas al iniciar sesión?</a>
                <p>¿No tienes una cuenta? <a href="#">Crear cuenta</a></p>
            </form>
        </div>
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