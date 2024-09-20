    <?php
    require "../../config/conexion.php";
    require "../../clienteFunciones.php";
    require '../../mailer.php';
    require 'serviciosFunciones.php';
    session_start();
    $varsesion = $_SESSION['email'];
    if ($varsesion == null || $varsesion == '') {
        header('location:../../../Index.php');
        die();
    }

    $errors = [];

    $FK_vehiculo = $_POST['FK_vehiculo'];
    if (servicioExiste($FK_vehiculo, $conectar)) {
        $errors[] =  "El vehículo ya tiene una reserva.";
    } 

    $fecha_reserva = $_POST['fecha_reserva'];  // La fecha seleccionada en el formulario
    $hora_reserva = $_POST['hora_reserva'];    // La hora seleccionada en el formulario
    
    if (fechaExiste($fecha_reserva, $hora_reserva, $conectar)) {
        $errors[] = "Ya existe una reserva en esa fecha y hora. Por favor, selecciona otro horario.";
    } 
    


    $email = $_SESSION['email'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $estado_vehiculo = $_POST['estado_vehiculo'];
    $FK_vehiculo = $_POST['FK_vehiculo'];
    $FK_servicios = $_POST['FK_servicios'];

    if (count($errors) === 0) {
    $insert = "INSERT INTO reservas(fecha_reserva,hora_reserva,estado_vehiculo,FK_vehiculo,FK_servicios) 
            VALUES('$fecha_reserva','$hora_reserva','$estado_vehiculo','$FK_vehiculo','$FK_servicios')";
    $query = mysqli_query($conectar, $insert);

    if ($query) {
        // Obtén el nombre de usuario y correo electrónico del usuario logueado
        $sql = "SELECT nom_usuario, email FROM usuario WHERE email = '$email'";
        $resultado = mysqli_query($conectar, $sql);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $nom_usuario = $fila['nom_usuario'];

            // Enviar correo
            $mailer = new mailer();
            $asunto = "TU SERVICIO HA SIDO AGENDADO $fecha_reserva - AquaShine";
            $cuerpo = "Estimado cliente: <br> Ha agendado un servicio para el día $fecha_reserva a la hora $hora_reserva";

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
                                text: 'Tu servicio ha sido agendado con exito. Se envio un correo ',
                                icon: 'success'
                            }).then(function() {
                                window.location = '../../views/servicios/user/viewservicesU.php'; // Redirige después de cerrar el Swal
                            });
                        </script>
                    </body>
                    </html>";
            } else {
                echo '<script>alert("Error al enviar el correo");</script>';
            }
        } else {
            echo '<script>alert("No se encontraron datos del usuario.");</script>';
        }
    } else {
        echo '<script>alert("Error al conectarse a la BD");</script>';
    }} else {
        // Mostrar errores con un alert de JavaScript
        echo "<script>
                let errorMsg = '" . implode("\\n", $errors) . "';
                alert(errorMsg);
                window.history.back(); // Redirigir hacia atrás
            </script>";
    }
    ?>
