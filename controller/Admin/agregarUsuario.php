$stmt = $conectar->prepare("INSERT INTO usuario (nom_usuario, apel_usuario, fecha_nacimiento, email, contrasena, confirmacion, FK_rol) 
                             VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nom_usuario, $apel_usuario, $fecha_nacimiento, $email, $pass_hash, $token, $FK_rol);

if ($stmt->execute()) {
    // Obtener el ID del usuario recién insertado
    $idUsuario = $conectar->insert_id;

    // Preparar el envío del correo
    require '../../mailer.php';
    $mailer = new mailer();
    $url =  'http://localhost/car/'.'activa_cliente.php?idUsuario='.$idUsuario.'&confirmacion='.$token;
    $asunto = "Activa tu cuenta - AquaShine";
    $cuerpo =  "Estimado cliente $nom_usuario: <br> 
                Para continuar con el proceso de registro, es importante que hagas clic en el siguiente enlace: 
                <a href='$url'>Activar cuenta</a>";

    // Enviar el correo
    if($mailer->enviarEmail($email, $asunto, $cuerpo)){
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
        echo "<script>
                 Swal.fire({
                     title: 'Error',
                     text: 'Hubo un problema al enviar el correo de confirmación.',
                     icon: 'error'
                 }).then(function() {
                     window.location = '../../register.php'; // Redirige después de cerrar el Swal
                 });
              </script>";
        exit; 
    }
    
} else {
    // Si ocurre un error al conectarse a la base de datos
    echo '<script>alert("Error al conectarse a la BD"); location.assign("register.html");</script>';
}
