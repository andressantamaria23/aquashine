
<?php
include("../../../config/conexion.php");
$sql = "SELECT idRol, nom_rol FROM rol";
    $result = mysqli_query($conectar, $sql);
// Comprobar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtener los datos enviados por POST
    $idUsuario = $_POST['idUsuario'];
    $nom_usuario = $_POST['nom_usuario'];
    $apel_usuario = $_POST['apel_usuario'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $FK_rol = $_POST['FK_rol'];


    $sql = "UPDATE usuario SET 
                nom_usuario = '$nom_usuario',
                apel_usuario = '$apel_usuario',
                fecha_nacimiento = '$fecha_nacimiento',
                email = '$email',
                contrasena = '$contrasena',
                FK_rol = '$FK_rol'
            WHERE idUsuario = '$idUsuario'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conectar, $sql);

    // Verificar si la actualización fue exitosa
    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("perfil.php");</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editPerfil.php?idUsuario='.$idUsuario.'");</script>';
    }

    
    mysqli_close($conectar);

} else {
    // Comprobar si se ha pasado un ID de usuario por GET
    if (isset($_GET['idUsuario'])) {
        $idUsuario = $_GET['idUsuario'];

        // Consulta para obtener los datos del usuario
        $sql = "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
        $resultado = mysqli_query($conectar, $sql);

        // Verificar si el usuario existe
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener los datos del usuario
            $fila = mysqli_fetch_assoc($resultado);
                $nom_usuario = $fila['nom_usuario'];
                $apel_usuario = $fila['apel_usuario'];
                $fecha_nacimiento = $fila['fecha_nacimiento'];
                $email = $fila['email'];
                $contrasena = $fila['contrasena'];
                $FK_rol = $fila['FK_rol'];
        } else {
            echo '<script>alert("Usuario no encontrado"); location.assign("perfil.php");</script>';
            exit();
        }

        // Cerrar la conexión
        mysqli_close($conectar);
    } else {
        echo '<script>alert("ID de usuario no proporcionado"); location.assign("perfil.php");</script>';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-semibold text-center mb-4 text-blue-600">Editar Usuario</h1>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="">
                <input type="hidden" name="idUsuario" value="<?php echo htmlspecialchars($idUsuario); ?>">

                <div class="mb-4 hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="idUsuario">ID Usuario</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario;?>" readonly>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom_usuario">Nombre</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" id="nom_usuario" name="nom_usuario" value="<?php echo $nom_usuario;?>" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="apel_usuario">Apellido</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" id="apel_usuario" name="apel_usuario" value="<?php echo $apel_usuario;?>" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nacimiento">Fecha Nacimiento</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento;?>" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="email" id="email" name="email" value="<?php echo $email;?>" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contraseña">Contraseña</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="password" id="contrasena" name="contrasena" value="<?php echo $contrasena;?>" >
                </div>

                <div class="mb-4 hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="FK_rol">Contraseña</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" id="FK_rol" name="FK_rol" value="<?php echo $FK_rol;?>" >
                </div>
                

                <div class="col-span-2">
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="enviar">
                        Guardar Cambios
                    </button>
                    <a href="indexAdmin.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
