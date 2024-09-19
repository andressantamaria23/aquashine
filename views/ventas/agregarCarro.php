<?php
session_start();
require_once './../../config/conexion.php'; // Asegúrate de que la ruta sea correcta

// Verificar si el formulario ha enviado el id del producto
if (isset($_POST['idProducto'])) {
    $idProducto = htmlspecialchars($_POST['idProducto']); // Proteger el dato del id del producto

    // Consultar el producto en la base de datos
    $sql = "SELECT idProductos, nom_producto, precio, img_producto FROM productos WHERE idProductos = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idProducto);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si se encontró el producto
    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();

        // Crear el carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Agregar el producto al carrito con los detalles
        $_SESSION['carrito'][] = [
            'id' => $producto['idProductos'],
            'nombre' => $producto['nom_producto'],
            'precio' => $producto['precio'],
            'imagen' => $producto['img_producto']
        ];

        // Redirigir al carrito de compras
        header("Location: carritoCompras.php");
        exit();
    } else {
        // Si no se encontró el producto, redirigir con un error
        header("Location: ../../../Index.php?error=ProductoNoEncontrado");
        exit();
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si no se envió el id del producto, redirigir a la página principal
    header("Location: ../../../Index.php");
    exit();
}
