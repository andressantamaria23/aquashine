<?php
// Incluir archivo de configuración para la conexión a la base de datos
include("../../config/conexion.php");

session_start();
if (!isset($_SESSION['user_id'])) {
    die("No estás autenticado. Inicia sesión para ver tu carrito.");
}

$id_usuario = $_SESSION['user_id'];

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los artículos del carrito
$sql = "SELECT p.nom_producto AS nombre_producto, cp.cantidad, p.precio, (cp.cantidad * p.precio) AS total
        FROM carrito cp
        JOIN productos p ON cp.FK_producto = p.idProductos
        WHERE cp.FK_usuario = ?";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

// Calcular el total general
$sql_total = "SELECT SUM(cp.cantidad * p.precio) AS total_general
              FROM carrito cp
              JOIN productos p ON cp.FK_producto = p.idProductos
              WHERE cp.FK_usuario = ?";
$stmt_total = $conn->prepare($sql_total);
if ($stmt_total === false) {
    die("Error en la preparación de la consulta total: " . $conn->error);
}
$stmt_total->bind_param("i", $id_usuario);
$stmt_total->execute();
$result_total = $stmt_total->get_result();
$row_total = $result_total->fetch_assoc();

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.0.0/tailwind.min.css">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Carrito de Compras</h1>

    <?php if ($result->num_rows > 0): ?>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Producto</th>
                <th class="py-2 px-4 border-b">Cantidad</th>
                <th class="py-2 px-4 border-b">Precio</th>
                <th class="py-2 px-4 border-b">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['nombre_producto']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['cantidad']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['precio']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['total']); ?></td>
            </tr>
            <?php endwhile; ?>
            <tr>
                <td colspan="3" class="py-2 px-4 border-b font-bold">Total:</td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row_total['total_general']); ?></td>
            </tr>
        </tbody>
    </table>
    <?php else: ?>
    <p class="text-center text-gray-500">Tu carrito está vacío.</p>
    <?php endif; ?>
</div>

</body>
</html>
