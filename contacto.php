<?php

if (empty($_POST["name"])) {
    exit("Falta el nombre");
}

if (empty($_POST["email"])) {
    exit("Falta el correo");
}

if (empty($_POST["phone"])) {
    exit("Falta el telefono");
}

if (empty($_POST["message"])) {
    exit("Falta el mensaje");
}

$nombre = $_POST["name"];
$correo = $_POST["email"];
$telefono = $_POST["phone"];
$mensaje = $_POST["message"];

$correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
if (!$correo) {
    echo "Correo inválido. Intenta con otro correo.";
    exit;
}

$asunto = "Mensaje Conctactanos";

$datos = "De: $nombre\nemail: $correo\nphone: $telefono \nmessage: $mensaje";
$mensaje = "Has recibido un mensaje desde el formulario de contacto de tu sitio web. Aquí están los detalles:\n$datos";
$destinatario = "imageninst.01@colegioexitus.edu.pe"; # aquí la persona que recibirá los mensajes
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