<?php
require "../../config/conexion.php"; // Asegúrate de que este archivo define $conn, no $conectar

$nom_usuario = $_POST['nom_usuario'];
$apel_usuario = $_POST['apel_usuario'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$FK_rol = $_POST['FK_rol'];

// Cambia $conectar a $conn si esa es la variable que usas para la conexión
$insert = "INSERT INTO usuario(nom_usuario, apel_usuario, fecha_nacimiento, email, contrasena, FK_rol) 
           VALUES('$nom_usuario','$apel_usuario','$fecha_nacimiento','$email','$contrasena','$FK_rol')";

$query = mysqli_query($conn, $insert);

if($query) {
    echo '<script>alert("Usuario Registrado");
    location.assign("../../Index.php");
    </script>';
} else {
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../register.html");
    </script>';
}
?>

<?php
require "../../config/conexion.php";

$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root";  // Tu nombre de usuario de MySQL
$password = "";  // Tu contraseña de MySQL
$dbname = "aquashine1"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nom_usuario'];
$apellido = $_POST['apel_usuario'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$password = $_POST['contrasena'];
$rol = $_POST['FK_rol']; // Clave foránea a la tabla de roles

// Validar si los campos están completos
if (empty($nombre) || empty($apellido) || empty($fecha_nacimiento) || empty($email) || empty($password) || empty($rol)) {
    echo "Por favor, completa todos los campos.";
    exit();
}

// Validar el valor de FK_rol
if (!is_numeric($rol) || $rol <= 0) {
    echo "El valor de FK_rol no es válido.";
    exit();
}

// Encriptar la contraseña antes de almacenarla
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar los datos en la tabla de usuarios
$sql = "INSERT INTO usuario (nom_usuario, apel_usuario, fecha_nacimiento, email, contrasena, FK_rol)
        VALUES (?, ?, ?, ?, ?, ?)";

// Preparar la sentencia
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("sssssi", $nombre, $apellido, $fecha_nacimiento, $email, $password_hash, $rol);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Usuario agregado correctamente.";
    } else {
        echo "Error al agregar usuario: " . $stmt->error;
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error en la preparación de la sentencia: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
