<?php
// Incluir autoload de PHPMailer
require 'vendor/autoload.php'; // Asegúrate de que la ruta es correcta
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura del email desde el formulario
    $para = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Verifica si el email es válido
    if (!filter_var($para, FILTER_VALIDATE_EMAIL)) {
        die('Dirección de correo electrónico no válida.');
    }

    // Creación de la instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'aquashineg5@gmail.com'; // Reemplaza con tu email
        $mail->Password = 'aquashinegaes5'; // Reemplaza con tu contraseña

        // Configuración del email
        $mail->setFrom('aquashineg5@gmail.com', 'AquaShine');
        $mail->addAddress($para);
        $mail->Subject = 'Enlace de restablecimiento';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Body = '<h1>Restablece tu contraseña</h1><p>Haz clic en el enlace para restablecer tu contraseña.</p>';

        // Enviar el correo
        $mail->send();
        echo 'Mensaje enviado con éxito a ' . $para;
    } catch (Exception $e) {
        echo 'No se pudo enviar el mensaje. Error: ', $mail->ErrorInfo;
    }
}
?>
