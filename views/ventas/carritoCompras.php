<?php
session_start();

// Verificar si hay productos en el carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<p>Tu carrito está vacío. <a href='../../Index.php'>Volver a la tienda</a></p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.0.0/tailwind.min.css">
    <style>
        .total {
            font-size: 1.25rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../../Index.php" class="text-xl font-semibold">Inicio</a>
            <a href="carritoCompras.php" class="text-xl font-semibold">Carrito</a>
        </div>
    </header>

    <main class="container mx-auto my-8 p-4">
        <h1 class="text-2xl font-bold mb-4">Tu Carrito de Compras</h1>
        <div class="bg-white shadow-lg rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $producto) {
                        $subtotal = $producto['precio'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="../../uploads/<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php echo htmlspecialchars($producto['nombre']); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                COP <?php echo number_format($producto['precio'], 2); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                1 <!-- Asumimos que la cantidad es 1 por producto, ajusta según tu lógica -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                COP <?php echo number_format($subtotal, 2); ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <div class="mt-4 flex justify-between items-center">
                <p class="total">Total: COP <?php echo number_format($total, 2); ?></p>
                <form action="procesarPago.php" method="POST">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Proceder al Pago</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
