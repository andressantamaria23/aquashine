<?php

require "../../config/conexion.php";
require "../../clienteFunciones.php";

$email = $_POST['email'];

// Generar token para la confirmación
$token = generarToken();

// Inicializar variable de errores
$errors = [];

// Validación de los campos
$sql = $conectar->prepare("SELECT idUsuario FROM usuario WHERE email = ? LIMIT 1");
$sql->bind_param("s", $email); // Vincula el parámetro email como string
$sql->execute(); // Ejecuta la consulta

if (!esEmail($email)) {
    $errors[] = "El correo no es válido.";
}



// Vincula el resultado a la variable idUsuario
$sql->bind_result($idUsuario);

// Obtén el resultado
if ($sql->fetch()) {
    // Cierra la consulta SELECT antes de llamar a SolicitarPassword
    $sql->close(); 

    // Ahora $idUsuario contiene el valor del ID del usuario
    $token = SolicitarPassword($idUsuario, $conectar); // Llama a la función

    if ($token !== null) {
        require '../../mailer.php';
        $mailer = new mailer();

        // URL para restablecer la contraseña
        $url = 'http://localhost/car/' . 'recuperar.php?idUsuario=' . $idUsuario . '&confirmacion_contrasena=' . $token;
        $asunto = "RECUPERAR CONTRASEÑA - AquaShine";
        $cuerpo = "Estimado cliente: <br>
                   Para restablecer su contraseña da clic en el siguiente enlace: 
                   <a href='$url'>RESTABLECER CONTRASEÑA</a>
                   <br> Si no hiciste la solicitud ignora este correo";

        // Enviar el email
        if ($mailer->enviarEmail($email, $asunto, $cuerpo)) {
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
            exit;
        } else {
            // Error al enviar el email
            echo "<script>
                     Swal.fire({
                         title: 'Error',
                         text: 'No se pudo enviar el email. Intente de nuevo más tarde.',
                         icon: 'error'
                     }).then(function() {
                         window.location = '../../register.php'; // Redirige después de cerrar el Swal
                     });
                  </script>";
            exit;
        }
    }
} else {
    // El correo no existe en la base de datos
    echo "<script>
             Swal.fire({
                 title: 'Error',
                 text: 'No existe una cuenta con ese correo electrónico.',
                 icon: 'error'
             }).then(function() {
                 window.location = '../../register.php'; // Redirige después de cerrar el Swal
             });
          </script>";
    exit;
}