<<<<<<< HEAD
<?php

$host = 'localhost';
$user = 'root';
$clave = '';
$bd = 'aquashine1';
$puerto = '3306';

$conectar = mysqli_connect($host, $user, $clave, $bd, $puerto);

?>
=======
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aquashine1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Línea de depuración
echo "Conexión establecida correctamente";
?>
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
