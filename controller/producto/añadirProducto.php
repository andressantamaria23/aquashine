<?php
// Habilitar la visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión
require "../conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario y sanitizarlos
    $nom_producto = $_POST['name'];
    $categoria_prod_idcat = $_POST['categoria']; // Esto es un array por el multiple select
    $precio = $_POST['precio'];
    $prod_descrip = $_POST['descripcion'];
    $proveedor_id = $_POST['proveedor_id']; // Este es el FK_proveedores

    // Verificar que los campos no estén vacíos
    if (empty($nom_producto) || empty($categoria_prod_idcat) || empty($precio) || empty($prod_descrip) || empty($proveedor_id)) {
        echo '<script>alert("Por favor, complete todos los campos.");
        location.assign("añadirProducto.php");
        </script>';
        exit();
    }

    // Manejo de la imagen
    $upload_dir = realpath('../uploads');
    $image_name = null;

    if ($_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $image_name = basename($_FILES['product_image']['name']);
        $image_url = $upload_dir . DIRECTORY_SEPARATOR . $image_name;

        if (!move_uploaded_file($tmp_name, $image_url)) {
            echo '<script>alert("Error al mover el archivo. Asegúrate de que el directorio tenga permisos de escritura.");
            location.assign("añadirProducto.php");
            </script>';
            exit();
        }
    } else {
        echo '<script>alert("Error al subir la imagen.");
        location.assign("añadirProducto.php");
        </script>';
        exit();
    }

    // Preparar la consulta SQL para evitar inyección SQL
    $stmt = $conectar->prepare("INSERT INTO productos (nom_producto, prod_descrip, categoria_prod_idcat, precio, img_producto, FK_proveedores) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisi", $nom_producto, $prod_descrip, implode(',', $categoria_prod_idcat), $precio, $image_name, $proveedor_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<script>alert("Producto registrado exitosamente.");
        location.assign("producto.php");
        </script>';
    } else {
        echo '<script>alert("Error al registrar el producto.");
        location.assign("añadirProducto.php");
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
    <title>Registrar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #e2e8f0; /* Fondo gris claro para contraste */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            background-color: #ffffff; /* Fondo blanco para el formulario */
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

        .form-group input, .form-group select {
            flex: 2;
            padding: 14px;
            border: 1px solid #d1d5db; /* Borde gris claro */
            border-radius: 12px;
            font-size: 16px;
            background-color: #f9fafb; /* Fondo gris claro para los campos */
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #1e3a8a; /* Borde azul oscuro al enfocar */
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2); /* Sombra azul claro al enfocar */
            outline: none; /* Elimina el contorno predeterminado */
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

        .file-input {
            display: block;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            background-color: #f9fafb;
            cursor: pointer;
            font-size: 16px;
        }

        .file-input:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
            outline: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="font-bold">Registrar Producto</h2>
        <form action="añadirProducto.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" placeholder="Ingrese el nombre del producto" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select id="categoria" name="categoria[]" multiple required>
                    <option value="ceras">Ceras, brillos y protección</option>
                    <option value="interior">Interior y exterior</option>
                    <option value="pulidores">Pulidores</option>
                    <option value="accesorios">Accesorios</option>
                </select>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" placeholder="Ingrese el precio" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción" required>
            </div>

            <div class="form-group">
                <label for="proveedor_id">Proveedor</label>
                <select id="proveedor_id" name="proveedor_id" required>
                    <?php
                    // Obtener los proveedores desde la base de datos
                    $result = $conectar->query("SELECT idProveedores, Nombre FROM proveedores");
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['idProveedores'] . '">' . $row['Nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="formFile" class="mb-2 inline-block text-neutral-500">
                    Imagen del Producto
                </label>
                <input
                    class="file-input"
                    type="file"
                    id="formFile"
                    name="product_image"
                />
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn">
                    Añadir Producto
                </button>
            </div>
        </form>
    </div>
</body>
</html>
