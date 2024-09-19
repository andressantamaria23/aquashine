<?php
include("../../config/conexion.php");

// Comprobar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtener los datos enviados por POST
    $idVehiculo = $_POST['idVehiculo'];
    $Placa = $_POST['Placa'];
    $tipo_vehiculo = $_POST['tipo_Vehiculo'];
    $color_vehiculo = $_POST['color_vehiculo'];
    $marca = $_POST['marca'];
    $FK_usuario = $_POST['FK_usuario'];

    // Consulta para actualizar los datos del usuario
    $sql = "UPDATE vehiculo SET 
                Placa = '$Placa',
                tipo_vehiculo = '$tipo_vehiculo',
                color_vehiculo = '$color_vehiculo',
                marca = '$marca',
                FK_usuario = '$FK_usuario'
            WHERE idVehiculo = '$idVehiculo'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conn, $sql);

    // Verificar si la actualización fue exitosa
    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("viewCar.php");</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editVe.php?idVehiculo ='.$idVehiculo.'");</script>';
    }

    // Cerrar la conexión
    mysqli_close($conn);

} else {
    // Comprobar si se ha pasado un ID de usuario por GET
    if (isset($_GET['idVehiculo'])) {
        $idVehiculo = $_GET['idVehiculo'];

        // Consulta para obtener los datos del usuario
        $sql = "SELECT * FROM vehiculo WHERE idVehiculo ='$idVehiculo'";
        $resultado = mysqli_query($conn, $sql);

        // Verificar si el usuario existe
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener los datos del usuario
            $fila = mysqli_fetch_assoc($resultado);
            $Placa = $fila['Placa'];
            $tipo_vehiculo = $fila['tipo_vehiculo'];
            $color_vehiculo = $fila['color_vehiculo'];
            $marca = $fila['marca'];
            $FK_usuario = $fila['FK_usuario'];
        } else {
            echo '<script>alert("Vehiculo no encontrado"); location.assign("viewCar.php");</script>';
            exit();
        }

        // Cerrar la conexión
        mysqli_close($conn);
    } else {
        echo '<script>alert("ID de vehiculo no proporcionado"); location.assign("viewCar.php");</script>';
        exit();
    }
}
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-semibold text-center mb-4 text-blue-600">Editar Vehículo</h1>
            <form action="../../controller/servicios/editarVe.php" method="POST">
                <div class="mb-4">
                    <label for="Placa" class="block text-gray-700 text-sm font-bold mb-2">Placa</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="Placa" name="Placa" placeholder="Placa" value="<?php echo htmlspecialchars($Placa); ?>" readonly>
                </div>

                <div class="mb-4">
                    <label for="tipo_vehiculo" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Vehículo</label>
                    <select id="tipo_vehiculo" name="tipo_vehiculo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            onchange="updateMarcaOptions()">
                        <option value=""></option>
                        <option value="carro" <?php echo ($tipo_vehiculo == 'carro') ? 'selected' : ''; ?>>Carro</option>
                        <option value="moto" <?php echo ($tipo_vehiculo == 'moto') ? 'selected' : ''; ?>>Moto</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="color_vehiculo" class="block text-gray-700 text-sm font-bold mb-2">Color del Vehículo</label>
                    <select id="color_vehiculo" name="color_vehiculo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value=""></option>
                        <option value="blanco" <?php echo ($color_vehiculo == 'blanco') ? 'selected' : ''; ?>>Blanco</option>
                        <option value="negro" <?php echo ($color_vehiculo == 'negro') ? 'selected' : ''; ?>>Negro</option>
                        <option value="gris" <?php echo ($color_vehiculo == 'gris') ? 'selected' : ''; ?>>Gris</option>
                        <option value="rojo" <?php echo ($color_vehiculo == 'rojo') ? 'selected' : ''; ?>>Rojo</option>
                        <option value="azul" <?php echo ($color_vehiculo == 'azul') ? 'selected' : ''; ?>>Azul</option>
                        <option value="plateado" <?php echo ($color_vehiculo == 'plateado') ? 'selected' : ''; ?>>Plateado</option>
                        <option value="verde" <?php echo ($color_vehiculo == 'verde') ? 'selected' : ''; ?>>Verde</option>
                        <option value="amarillo" <?php echo ($color_vehiculo == 'amarillo') ? 'selected' : ''; ?>>Amarillo</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="marca" class="block text-gray-700 text-sm font-bold mb-2">Marca</label>
                    <select id="marca" name="marca" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Seleccione la marca</option>
                        <?php
                        $marcasCarro = ['Toyota', 'Ford', 'Chevrolet', 'Honda', 'Nissan', 'Volkswagen'];
                        $marcasMoto = ['Yamaha', 'Honda', 'Suzuki', 'Kawasaki', 'Harley-Davidson', 'Ducati', 'Pulsar', 'TVS'];
                        $marcas = ($tipo_vehiculo == 'carro') ? $marcasCarro : $marcasMoto;

                        foreach ($marcas as $marcaOption) {
                            $selected = ($marca == $marcaOption) ? 'selected' : '';
                            echo "<option value=\"$marcaOption\" $selected>$marcaOption</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Guardar Cambios
                    </button>
                    <a href="viewCar.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateMarcaOptions() {
            const tipoVehiculo = document.getElementById('tipo_vehiculo').value;
            const marcaSelect = document.getElementById('marca');

            // Limpiar las opciones actuales
            marcaSelect.innerHTML = '<option value="">Seleccione la marca</option>';

            // Añadir opciones basadas en el tipo de vehículo
            const marcasCarro = ['Toyota', 'Ford', 'Chevrolet', 'Honda', 'Nissan', 'Volkswagen'];
            const marcasMoto = ['Yamaha', 'Honda', 'Suzuki', 'Kawasaki', 'Harley-Davidson', 'Ducati', 'Pulsar', 'TVS'];
            const marcas = (tipoVehiculo === 'carro') ? marcasCarro : marcasMoto;

            marcas.forEach(marca => {
                const option = document.createElement('option');
                option.value = marca;
                option.text = marca;
                marcaSelect.appendChild(option);
            });
        }
    </script>
</body>
</html>
