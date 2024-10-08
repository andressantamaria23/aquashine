<?php
include("../../../config/conexion.php");


if (isset($_POST['enviar'])) {
    // Obtener los datos enviados por POST
    $idVehiculo = $_POST['idVehiculo'];
    $Placa = $_POST['Placa'];
    $FK_tipoVehiculo = $_POST['FK_tipoVehiculo'];
    $color_vehiculo = $_POST['color_vehiculo'];
    $marca = $_POST['marca'];
    $FK_usuario = $_POST['FK_usuario'];

    // Consulta para actualizar los datos del vehículo
    $sql = "UPDATE vehiculo SET 
                Placa = '$Placa',
                FK_tipoVehiculo = '$FK_tipoVehiculo',
                color_vehiculo = '$color_vehiculo',
                marca = '$marca',
                FK_usuario = '$FK_usuario'
            WHERE idVehiculo = '$idVehiculo'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conectar, $sql);

    // Verificar si la actualización fue exitosa
    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("viewCar.php");</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editVe.php?idVehiculo='.$idVehiculo.'");</script>';
    }

    // Cerrar la conexión
    mysqli_close($conectar);

} else {
    // Comprobar si se ha pasado un ID de vehículo por GET
    if (isset($_GET['idVehiculo'])) {
        $idVehiculo = $_GET['idVehiculo'];

        // Consulta para obtener los datos del vehículo
        $sql = "SELECT * FROM vehiculo WHERE idVehiculo ='$idVehiculo'";
        $resultado = mysqli_query($conectar, $sql);

        // Verificar si el vehículo existe
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener los datos del vehículo
            $fila = mysqli_fetch_assoc($resultado);
            $Placa = $fila['Placa'];
            $FK_tipoVehiculo = $fila['FK_tipoVehiculo'];
            $color_vehiculo = $fila['color_vehiculo'];
            $marca = $fila['marca'];
            $FK_usuario = $fila['FK_usuario'];
        } else {
            echo '<script>alert("Vehículo no encontrado"); location.assign("viewCar.php");</script>';
            exit();
        }

        // Cerrar la conexión
        mysqli_close($conectar);
    } else {
        echo '<script>alert("ID de vehículo no proporcionado"); location.assign("viewCar.php");</script>';
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
            <form action="editVe.php?idVehiculo=<?php echo $idVehiculo; ?>" method="POST">
                <input type="hidden" name="idVehiculo" value="<?php echo $idVehiculo; ?>" />

                <div class="mb-4">
                    <label for="Placa" class="block text-gray-700 text-sm font-bold mb-2">Placa</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="Placa" name="Placa" placeholder="Placa" value="<?php echo htmlspecialchars($Placa); ?>" required>
                </div>

                <div class="mb-4">
                    <label for="FK_tipoVehiculo" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Vehículo</label>
                    <select id="FK_tipoVehiculo" name="FK_tipoVehiculo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="updateMarcaOptions()">
                        <option value="">Seleccione el tipo de vehículo</option>
                        <option value="1" <?php echo ($FK_tipoVehiculo == '1') ? 'selected' : ''; ?>>Carro</option>
                        <option value="3" <?php echo ($FK_tipoVehiculo == '3') ? 'selected' : ''; ?>>Moto</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="color_vehiculo" class="block text-gray-700 text-sm font-bold mb-2">Color del Vehículo</label>
                    <select id="color_vehiculo" name="color_vehiculo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
                        // Definir las marcas segun el tipo de vehículo seleccionado
                        $marcasCarro = ['Toyota', 'Ford', 'Chevrolet', 'Honda', 'Nissan', 'Volkswagen'];
                        $marcasMoto = ['Yamaha', 'Honda', 'Suzuki', 'Kawasaki', 'Harley-Davidson', 'Ducati', 'Pulsar', 'TVS'];
                        $marcas = ($FK_tipoVehiculo == '1') ? $marcasCarro : $marcasMoto;

                        foreach ($marcas as $marcaOption) {
                            $selected = ($marca == $marcaOption) ? 'selected' : '';
                            echo "<option value=\"$marcaOption\" $selected>$marcaOption</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="FK_usuario" value="<?php echo $FK_usuario; ?>" />
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="enviar">
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
            const tipoVehiculo = document.getElementById('FK_tipoVehiculo').value;
            const marcaSelect = document.getElementById('marca');

            // Limpiar las opciones actuales
            marcaSelect.innerHTML = '<option value="">Seleccione la marca</option>';

            // Añadir opciones basadas en el tipo de vehículo
            const marcasCarro = ['Toyota', 'Ford', 'Chevrolet', 'Honda', 'Nissan', 'Volkswagen'];
            const marcasMoto = ['Yamaha', 'Honda', 'Suzuki', 'Kawasaki', 'Harley-Davidson', 'Ducati', 'Pulsar', 'TVS'];
            const marcas = (tipoVehiculo === '1') ? marcasCarro : marcasMoto;

            marcas.forEach(marca => {
                const option = document.createElement('option');
                option.value = marca;
                option.text = marca;
                marcaSelect.appendChild(option);
            });
        }

        // Ejecutar la función al cargar la página para asegurarse de que las marcas coincidan con el tipo seleccionado
        window.onload = function() {
            updateMarcaOptions();
        };
    </script>
</body>
</html>
