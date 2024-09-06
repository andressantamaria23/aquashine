<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
<<<<<<< HEAD
require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión
=======
require "../conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7

if (isset($_GET['id'])) {
    $idCompras = $_GET['id'];

    // Crear la consulta SQL para eliminar el proveedor
    $sql = "DELETE FROM compras WHERE idCompras = ?";
    
    // Preparar la declaración
    if ($stmt = mysqli_prepare($conectar, $sql)) {
        // Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "i", $idCompras);

        // Ejecutar la declaración
        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a la lista de proveedores después de eliminar
            header("Location: compras.php?msg=Compra eliminada correctamente");
            exit();
        } else {
            echo "Error: No se pudo ejecutar la consulta: " . mysqli_error($conectar);
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: No se pudo preparar la consulta: " . mysqli_error($conectar);
    }

    // Cerrar la conexión
    mysqli_close($conectar);
} else {
    echo "Error: ID de producto no especificado.";
}
?>
