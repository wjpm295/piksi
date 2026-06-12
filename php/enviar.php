<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = strip_tags(trim($_POST['nombre']));
    $telefono = strip_tags(trim($_POST['telefono']));
    $fecha = strip_tags(trim($_POST['fecha']));
    $mensaje = strip_tags(trim($_POST['mensaje']));

    // Correo destino (cambiar por tu correo real)
    $destino = "tuevento@pikishow.com";   // Reemplazar por correo de la empresa
    $asunto = "Nuevo contacto desde PIKSI SHOW - Web";

    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Teléfono/WhatsApp: $telefono\n";
    $cuerpo .= "Fecha del evento: $fecha\n";
    $cuerpo .= "Mensaje: $mensaje\n";
    
    $headers = "From: noresponder@pikishow.com\r\n";
    $headers .= "Reply-To: $telefono\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($destino, $asunto, $cuerpo, $headers)) {
        // Redirigir a index con mensaje de éxito
        header("Location: ../index.html?envio=exito#contacto");
    } else {
        echo "Hubo un error al enviar. Por favor, escríbenos directamente al WhatsApp 62284296.";
    }
} else {
    echo "Acceso no permitido.";
}
?>