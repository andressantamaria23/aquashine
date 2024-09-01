<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificador = $_POST['identificador'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $fecha_registro = $_POST['fecha_registro'];

    $sql = "INSERT INTO productos (identificador, nombre, categoria, precio, cantidad, fecha_registro) 
            VALUES ('$identificador', '$nombre', '$categoria', $precio, $cantidad, '$fecha_registro')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
