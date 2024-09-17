<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$email = $_POST['email'];
$nom_usuario = $_POST['nom_usuario'];

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.sendgrid.net';      // Servidor SMTP de SendGrid
    $mail->SMTPAuth   = true;
    $mail->Username   = 'apikey';                 // SendGrid requiere "apikey" como usuario
    $mail->Password   = ''; // La API Key de SendGrid
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('aquashineg5@gmail.com', 'Aquashine');
    $mail->addAddress($email, $nom_usuario);  

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Prueba Registar';
    $mail->Body    = 'TE HAS REGISTRADO A AQUASHINE';

    // Enviar el correo
    $mail->send();
    echo json_encode(['exito' => true, 'mensaje' => 'Correo enviado correctamente']);
} catch (Exception $e) {
    echo json_encode(['exito' => false, 'mensaje' => 'Error al enviar el correo']);
}
