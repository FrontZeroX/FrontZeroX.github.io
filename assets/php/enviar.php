<?php

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre  = htmlspecialchars($_POST["nombre"]);
    $email   = htmlspecialchars($_POST["email"]);
    $asunto  = htmlspecialchars($_POST["asunto"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    $destino = "miguelantoniomunoz03@gmail.com";

    $contenido  = "Nuevo mensaje desde el portafolio\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n";
    $contenido .= "Asunto: $asunto\n\n";
    $contenido .= "Mensaje:\n$mensaje";

    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($destino, $asunto, $contenido, $headers)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }

} else {
    echo json_encode(["status" => "error"]);
}
