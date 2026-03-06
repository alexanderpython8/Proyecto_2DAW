<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Formulario</title>
</head>
<body>
    <main class="container">
        <div class="col-4 mx-auto vh-100 d-flex align-items-center">
            <div class="cent bg-dark w-100 p-5 rounded-2">
                <h1>Big Bang</h1>
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
                <form method="post">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>

                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control">

                    <input type="submit" value="Iniciar sesion" id="submit" name="submit" class="btn btn-primary w-100 mt-4 bg-opacity-25" required>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>