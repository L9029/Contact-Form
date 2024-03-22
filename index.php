<?php

$status = "";

function validate($name, $email, $subject, $message, $form){
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

if (isset($_POST["form"])) {
    //Array unpacking
    if (validate(...$_POST)) {
        $name = htmlentities($_POST["name"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $subject = htmlentities($_POST["subject"]);
        $message = htmlentities($_POST["message"]);

        $status = "Success";
    }else {
        $status = "Error";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Formulario de Contacto</title>
</head>
<body>
    <main>
        <section>
            <?php if($status == "Error"): ?>

                <div class="alert danger">
                    <span><i class="fa-solid fa-circle-exclamation"></i> Surgio un Problema</span>
                </div>

            <?php endif; ?>

            <?php if($status == "Success"):?>

                <div class="alert success">
                    <span><i class="fa-solid fa-circle-exclamation"></i> ¡Mensaje Enviado con Éxito!</span>
                </div>

            <?php endif; ?>
            
            <form action="./index.php" method="post">

                <h1>Contactanos</h1>

                <div class="input-group">
                    <label for="name">Nombre: </label>
                    <input type="text" name="name" id="name">
                </div>

                <div class="input-group">
                    <label for="email">Correo: </label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="input-group">
                    <label for="subject">Asunto: </label>
                    <input type="text" name="subject" id="subject">
                </div>

                <div class="input-group">
                    <label for="message">Mensaje: </label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>

                <div class="button-container">
                    <button type="submit" name="form">Enviar</button>
                </div>

                <div class="contact-info">
                    <div class="info">
                        <span><i class="fa-solid fa-location-dot"></i> 13 Saw Mill Circle, North Olmest</span>
                    </div>

                    <div class="info">
                        <span><i class="fa-solid fa-phone"></i> +1 234 567 890</span>
                    </div>
                </div>
            </form>

            <script src="https://kit.fontawesome.com/60f707750a.js" crossorigin="anonymous"></script>
        </section>
    </main>
</body>
</html>