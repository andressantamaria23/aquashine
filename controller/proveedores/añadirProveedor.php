<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario y sanitizarlos
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Verificar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($telefono)) {
        echo '<script>alert("Por favor, complete todos los campos.");
        location.assign("añadirProveedor.php");
        </script>';
        exit();
    }

    // Preparar la consulta SQL para evitar inyección SQL
    $stmt = $conectar->prepare("INSERT INTO proveedores (Nombre, email, telefono) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $telefono);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<script>alert("Proveedor registrado exitosamente.");
        location.assign("proveedores.php");
        </script>';
    } else {
        echo '<script>alert("Error al registrar el proveedor.");
        location.assign("añadirProveedor.php");
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
    <title>Registrar Proveedor</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
    <style>
        body {
            background-image: url('../img/lavad.jpg'); /* Reemplaza con la URL de tu imagen */
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
            max-width: 700px;
            margin: 20px;
        }

        .form-container h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #1e3a8a; /* Azul oscuro para el título */
            text-align: center;
            font-weight: 700;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            flex: 1;
            font-size: 16px;
            color: #1e3a8a; /* Azul oscuro para las etiquetas */
            font-weight: 600;
        }

        .form-group input {
            flex: 2;
            padding: 14px;
            border: 1px solid #d1d5db; /* Borde gris claro */
            border-radius: 12px;
            font-size: 16px;
            background-color: #f9fafb; /* Fondo gris claro para los campos */
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            border-color: #1e3a8a; /* Borde azul oscuro al enfocar */
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2); /* Sombra azul claro al enfocar */
            outline: none; /* Elimina el contorno predeterminado */
        }

        .btn-container {
            display: flex;
            justify-content: center; /* Centrar el botón horizontalmente */
            margin-top: 20px;
        }

        .btn {
            background-color: #1e3a8a; /* Fondo azul oscuro para el botón */
            color: white;
            border: none;
            padding: 14px 20px;
            cursor: pointer;
            border-radius: 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            font-weight: 600;
        }

        .btn:hover {
            background-color: #1e40af; /* Azul más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="font-bold">Registrar Proveedor</h2>
        <form action="añadirProveedor.php" method="POST">
            <br>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" placeholder="Ingrese el nombre del proveedor" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Ingrese el email" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Ingrese el teléfono" required>
            </div>

            <div class="form-group">
                <label for="registration_date">Fecha de Registro</label>
                <input type="date" id="registration_date" name="registration_date" required>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn">
                    Añadir Proveedor
                </button>
                <a href="proveedores.php" class="btn-cancel">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
