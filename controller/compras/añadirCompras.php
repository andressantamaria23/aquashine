<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
<<<<<<< HEAD
require "../../config/conexion.php";
=======
require "../conexion.php";
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7

// Verificar la conexión a la base de datos
if (!$conectar) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar que la tabla 'productos' existe y tiene datos
$queryProductos = "SELECT idProductos, nom_producto FROM productos";
$resultProductos = $conectar->query($queryProductos);

if (!$resultProductos) {
    die("Error en la consulta de productos: " . $conectar->error);
}

// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fechaCompra = $_POST['fechaCompra'];
    $cantidad = $_POST['cantidad'];
    $precioUnitario = $_POST['precioUnitario'];
    $precioTotal = $_POST['precioTotal'];
<<<<<<< HEAD
=======
    $estado = $_POST['estado'];
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
    $observaciones = !empty($_POST['observaciones']) ? $_POST['observaciones'] : NULL;
    $fk_proveedores = $_POST['fk_proveedores']; 
    $fk_producto = $_POST['fk_producto']; 

    // Verificar que los campos obligatorios no estén vacíos
<<<<<<< HEAD
    if (empty($fechaCompra) || empty($cantidad) || empty($precioUnitario) || empty($precioTotal) || empty($fk_proveedores) || empty($fk_producto)) {
=======
    if (empty($fechaCompra) || empty($cantidad) || empty($precioUnitario) || empty($precioTotal) || empty($estado) || empty($fk_proveedores) || empty($fk_producto)) {
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
        echo '<script>alert("Por favor, complete todos los campos obligatorios.");
        location.assign("añadirCompras.php");
        </script>';
        exit();
    }

    // Preparar la consulta SQL para evitar inyección SQL
<<<<<<< HEAD
    $stmt = $conectar->prepare("INSERT INTO compras (fechaCompra, cantidad, precioUnitario, precioTotal, observaciones, FK_proveedores, FK_producto) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Vincular parámetros, teniendo en cuenta que observaciones puede ser NULL
    $stmt->bind_param("sisssii", $fechaCompra, $cantidad, $precioUnitario, $precioTotal, $observaciones, $fk_proveedores, $fk_producto);
=======
    $stmt = $conectar->prepare("INSERT INTO compras (fechaCompra, cantidad, precioUnitario, precioTotal, estado, observaciones, FK_proveedores, FK_producto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Vincular parámetros, teniendo en cuenta que observaciones puede ser NULL
    $stmt->bind_param("sissssii", $fechaCompra, $cantidad, $precioUnitario, $precioTotal, $estado, $observaciones, $fk_proveedores, $fk_producto);
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<script>alert("Compra registrada exitosamente.");
        location.assign("compras.php");
        </script>';
    } else {
        echo '<script>alert("Error al registrar la compra.");
        location.assign("añadirCompras.php");
        </script>';
    }

    // Cerrar la conexión
    $stmt->close();
    $conectar->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Compra</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
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
            font-size: 28px;
            margin-bottom: 20px;
            color: #1e3a8a;
            text-align: center;
            font-weight: 700;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #1e3a8a;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9fafb;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
            outline: none;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
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
    </style>
</head>
<body>
    
    <div class="form-container">
        <h2>Registrar Compra</h2>
        <form action="añadirCompras.php" method="POST">
            <div class="form-group">
                <label for="fechaCompra">Fecha Compra</label>
                <input type="date" id="fechaCompra" name="fechaCompra" placeholder="Ingrese la fecha de compra" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" required>
            </div>

            <div class="form-group">
                <label for="precioUnitario">Precio Unitario</label>
                <input type="number" id="precioUnitario" name="precioUnitario" placeholder="Ingrese el precio unitario" required>
            </div>

            <div class="form-group">
                <label for="precioTotal">Precio Total</label>
                <input type="number" id="precioTotal" name="precioTotal" placeholder="Ingrese el precio total" required>
            </div>

<<<<<<< HEAD
=======
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" id="estado" name="estado" placeholder="Ingrese el estado" required>
            </div>
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7

            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <input type="text" id="observaciones" name="observaciones" placeholder="Ingrese las observaciones">
            </div>

            <div class="form-group">
                <label for="fk_proveedores">Proveedor</label>
                <select id="fk_proveedores" name="fk_proveedores" required>
                    <option value="">Seleccione un proveedor</option>
                    <?php
                    // Obtener la lista de proveedores desde la base de datos
                    $resultProveedores = $conectar->query("SELECT idProveedores, nombre FROM proveedores");
                    if ($resultProveedores) {
                        while ($row = $resultProveedores->fetch_assoc()) {
                            echo "<option value='" . $row['idProveedores'] . "'>" . $row['nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No se pudieron cargar los proveedores</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="fk_producto">Producto</label>
                <select id="fk_producto" name="fk_producto" required>
                    <option value="">Seleccione un producto</option>
                    <?php
                    // Obtener la lista de productos desde la base de datos
                    if ($resultProductos->num_rows > 0) {
                        while ($row = $resultProductos->fetch_assoc()) {
                            echo "<option value='" . $row['idProductos'] . "'>" . $row['nom_producto'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay productos disponibles</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn">Añadir Compra</button>
                <a href="compras.php" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
