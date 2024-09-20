<?php
session_start();
$varsesion = $_SESSION['email'];
if ($varsesion == null || $varsesion == '') {
    header('location:../../../Index.php');
    die();
}

include("../../../config/conexion.php");

// Obtener datos del usuario
$email = $_SESSION['email'];
$sql = "SELECT idUsuario, nom_usuario, apel_usuario, fecha_nacimiento, email, contrasena, FK_rol FROM usuario
        INNER JOIN rol ON rol.idRol = usuario.FK_rol 
        WHERE email = '$varsesion'"; 

$resultado = mysqli_query($conectar, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $idUsuario = $fila['idUsuario'];
    $nom_usuario = $fila['nom_usuario'];
    $apel_usuario = $fila['apel_usuario'];
    $fecha_nacimiento = $fila['fecha_nacimiento'];
    $email = $fila['email'];
    $contrasena = $fila['contrasena'];
    $FK_rol = $fila['FK_rol'];
} else {
    die("No se encontraron datos para el usuario.");
}

// Obtener vehículos del usuario
$sqle = "SELECT idVehiculo, Placa FROM vehiculo
        WHERE FK_usuario = '$idUsuario'";
$result = mysqli_query($conectar, $sqle);


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Servicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('../img/lavad.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            margin: 20px;
        }

        .form-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1e3a8a;
            text-align: center;
            font-weight: 700;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group label {
            position: absolute;
            top: 0;
            left: 12px;
            background-color: #ffffff;
            padding: 0 4px;
            font-size: 14px;
            color: #1e3a8a;
            font-weight: 600;
            transition: all 0.2s ease;
            pointer-events: none;
        }

        .form-group input {
            padding: 12px 12px 12px 40px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9fafb;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }

        .form-group input:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
            outline: none;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -18px;
            left: 12px;
            font-size: 12px;
            color: #1e40af;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #1e3a8a;
            color: white;
            border: none;
            padding: 10px 16px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #1e40af;
        }
        .form-group input, .form-group select {
            padding: 12px 12px 12px 40px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9fafb;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }
        .form-group input:focus, .form-group select:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
            outline: none;
        }
    </style>
</head>
<body>
<?php
include("../../../config/conexion.php");


  
  $sql = "SELECT idServicios, nom_servicio, precio FROM servicios ";
  
  
  $resultado = mysqli_query($conectar, $sql);

  ?>
    <div class="form-container mx-auto">
        <h2>Agendar  Servicio</h2>
        <form action="../../../controller/servicios/agendarservicio.php" method="POST">
    <div class="form-group">
        <input type="date" id="fecha_reserva" name="fecha_reserva" placeholder=" " required>
        <label for="fecha_reserva">Fecha Reserva</label>
    </div>

    <div class="form-group">
        <select id="hora_reserva" name="hora_reserva" required>
            <option value="">Seleccione una hora</option>
            <option value="8:00">8:00</option>
            <option value="9:30">9:30</option>
            <option value="11:00">11:00</option>
            <option value="12:30">12:30</option>
            <option value="14:00">14:00</option>
            <option value="15:30">15:30</option>
            <option value="17:00">17:00</option>
            <option value="18:30">18:30</option>
        </select>
        <label for="hora_reserva">Seleccione hora</label>
    </div>

    <div class="form-group hidden">
        <input type="text" id="estado_vehiculo" name="estado_vehiculo" placeholder=" " required value="Pendiente">
        <label for="estado">Estado</label>
    </div>

    <div class="form-group hidden">
        <input type="text" id="nom_usuario" name="nom_usuario" placeholder=" " required value="<?php echo htmlspecialchars($nom_usuario); ?>">
        <label for="nom_usuario">Usuario</label>
    </div>

    <div class="form-group hidden">
        <input type="text" id="email" name="email" placeholder=" " required value="<?php echo htmlspecialchars($email); ?>">
        <label for="email">Email</label>
    </div>

    <div class="form-group">
        <select id="FK_vehiculo" name="FK_vehiculo" required>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo htmlspecialchars($row['idVehiculo']); ?>">
                    <?php echo htmlspecialchars($row['Placa']); ?>
                </option>
            <?php } ?>
        </select>
        <label for="FK_vehiculo">Vehículo</label>
    </div>

    <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="FK_servicios">Servicios</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="FK_servicios" name="FK_servicios" required>
                        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                            <option value="<?php echo $row['idServicios']; ?>">
                                <?php echo htmlspecialchars($row['nom_servicio']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-span-2">
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="enviar">
                        Registrar
                    </button>
                    <a href="viewServicesU.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
                </div>
</body>

<script>
    // Obtener la fecha de hoy
    var today = new Date();
    
    // Obtener la fecha de mañana
    var tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    
    // Formatear la fecha en 'YYYY-MM-DD'
    var minDate = tomorrow.toISOString().split('T')[0];
    
    // Establecer el valor mínimo del input tipo date
    document.getElementById("fecha_reserva").setAttribute('min', minDate);
</script>



</html>
