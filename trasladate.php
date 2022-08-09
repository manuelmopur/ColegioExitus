<?php

if (empty($_POST["name"])) {
    exit("Falta el nombre");
}

if (empty($_POST["correo"])) {
    exit("Falta el correo");
}

if (empty($_POST["telefono"])) {
    exit("Falta el telefono");
}

if (empty($_POST["grado"])) {
    exit("Falta el grado");
}

$nombre = $_POST["name"];
$ciudad = $_POST["correo"];
$telefono = $_POST["telefono"];
$grado = $_POST["grado"];




$asunto = "Mensaje de Trasladate";

$datos = "De: $nombre\ncorreo: $correo\ntelefono: $telefono \ngrado: $grado";
$mensaje = "Has recibido un mensaje desde el formulario de trasladate de tu sitio web. Aquí están los detalles:\n$datos";
$destinatario = "direccionacademica@colegioexitus.edu.pe"; # aquí la persona que recibirá los mensajes
$encabezados = "Sender: correo@dominio.com\r\n"; # El remitente, debe ser un correo de tu dominio de servidor
$encabezados .= "From: $nombre <" . $correo . ">\r\n";
$encabezados .= "Reply-To: $nombre <$correo>\r\n";
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados);
if ($resultado) {
    echo "<h1>Mensaje enviado, ¡Gracias por contactarnos, en breve nos comunicaremos !</h1>";
    echo "<h1>EXITUS, ¡FORMADORES DE NUEVAS GENERACIONES!</h1>";
} else {
    echo "Tu mensaje no se ha enviado. Intenta de nuevo.";
}