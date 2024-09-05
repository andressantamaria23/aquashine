<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos
require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión

// Verificar si se ha pasado el ID en la URL
if (isset($_GET['id'])) {
    $idInventario = $_GET['id'];

    // Crear la consulta SQL para eliminar el registro del inventario
    $sql = "DELETE FROM inventario WHERE idInventario = ?";

    // Preparar la declaración
    if ($stmt = mysqli_prepare($conectar, $sql)) {
        // Vincular la variable del ID a la declaración preparada como parámetro
        mysqli_stmt_bind_param($stmt, "i", $idInventario);

        // Ejecutar la declaración
        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a la lista de inventario con un mensaje de éxito
            header("Location: inventario.php?msg=Inventario eliminado correctamente");
            exit();
        } else {
            // Mostrar mensaje de error si no se pudo ejecutar la consulta
            echo "Error: No se pudo ejecutar la consulta. " . mysqli_stmt_error($stmt);
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        // Mostrar mensaje de error si no se pudo preparar la consulta
        echo "Error: No se pudo preparar la consulta. " . mysqli_error($conectar);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conectar);
} else {
    // Mostrar mensaje de error si el ID no está especificado
    echo "Error: ID de inventario no especificado.";
}
?>
