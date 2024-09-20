<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/form2/vendor/autoload.php';

class mailer {
    function enviarEmail($email, $asunto, $cuerpo) {
        $mail = new PHPMailer(true);

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
            $mail->addAddress($email);

            // Content
             // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;

            // Enviar el correo
            $mail->send();
            return true; // Indica que el correo fue enviado exitosamente

        } catch (Exception $e) {
            // Manejo de errores
            return false; // Indica que hubo un error al enviar el correo
        }
    }
}
