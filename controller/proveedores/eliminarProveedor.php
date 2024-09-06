<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión

if (isset($_GET['id'])) {
    $idProveedores = $_GET['id'];

    // Crear la consulta SQL para eliminar el proveedor
    $sql = "DELETE FROM proveedores WHERE idProveedores = ?";
    
    // Preparar la declaración
    if ($stmt = mysqli_prepare($conectar, $sql)) {
        // Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "i", $idProveedores);

        // Ejecutar la declaración
        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a la lista de proveedores después de eliminar
            header("Location: proveedores.php?msg=Proveedor eliminado correctamente");
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
    echo "Error: ID de proveedor no especificado.";
}
?>
