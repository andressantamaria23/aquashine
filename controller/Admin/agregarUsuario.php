<?php
require "../../config/conexion.php";
require "../../clienteFunciones.php";

// Recoger datos del formulario
$nom_usuario = $_POST['nom_usuario'];
$apel_usuario = $_POST['apel_usuario'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$FK_rol = $_POST['FK_rol'];

// Generar token para la confirmación
$token = generarToken();

// Cifrar la contraseña antes de insertarla
//$pass_hash = password_hash($contrasena, PASSWORD_DEFAULT);

// Inicializar variable de errores
$errors = [];

// Validación de los campos
if (esNulo([$nom_usuario, $apel_usuario, $fecha_nacimiento, $email, $contrasena, $FK_rol])) {
    $errors[] = "Debe llenar todos los campos.";
}
if (!esEmail($email)) {
    $errors[] = "El correo no es válido.";
}
if (emailExists($email, $conectar)) {
    $errors[] = "El correo electrónico $email ya existe.";
}

// Si no hay errores, proceder a insertar el usuario
if (count($errors) === 0) {
    
    $insert = "INSERT INTO usuario (nom_usuario, apel_usuario, fecha_nacimiento, email, contrasena, confirmacion, FK_rol) 
               VALUES ('$nom_usuario', '$apel_usuario', '$fecha_nacimiento', '$email', '$contrasena', '$token', '$FK_rol')";
    
    // Ejecutar la consulta
    $query = mysqli_query($conectar, $insert);

    if ($query) {
        // Obtener el ID del usuario recién insertado
        $idUsuario = mysqli_insert_id($conectar);

        // Preparar el envío del correo
        require '../../mailer.php';
        $mailer = new mailer();
        $url =  'https://0781-38-52-155-163.ngrok-free.app/car'.'/activar_cliente.php?idUsuario='.$idUsuario.'&confirmacion='.$token;
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
} else {
    // Mostrar errores con un alert de JavaScript
    echo "<script>
            let errorMsg = '" . implode("\\n", $errors) . "';
            alert(errorMsg);
            window.history.back(); // Redirigir hacia atrás
          </script>";
}
?>
