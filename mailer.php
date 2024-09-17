<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader


class mailer{
    function enviarEmail($email, $asunto, $cuerpo){
        require 'phpmailer/form2/vendor/autoload.php';
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
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;

    // Enviar el correo
    $mail->send();
echo "<!DOCTYPE html>
      <html lang='es'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Registro Exitoso</title>
          <link rel='shortcut icon' href='../../static/img/aquashine.php' type='image/x-icon'>
          <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css' rel='stylesheet'>
      </head>
      <body>
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js'></script>
          <script>
              Swal.fire({
                  title: '¡Excelente!',
                  text: 'Se envió un email a $email.',
                  icon: 'success'
              }).then(function() {
                  window.location = '../../login.php'; // Redirige después de cerrar el Swal
              });
          </script>
      </body>
      </html>";


} catch (Exception $e) {
    echo json_encode(['exito' => false, 'mensaje' => 'Error al enviar el correo']);
}
    }
    
    



}